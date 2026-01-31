<?php 

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\{Camera, ParkingSlot};
use DB;
use phpseclib3\Net\SSH2;
use phpseclib3\Crypt\RSA;
use Carbon\Carbon;

class NewDetectNumberPlateSlotsCoordinateFour implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
 
    public function handle(): void
    {
        try
        {
            $job_check = ParkingSlot::where('id', 1)->where('is_checked', 0)->first();
            if (!$job_check) 
            {
                \Log::info("Job already running or completed.");
                return;
            }

            $job_check->is_checked = 1;
            $job_check->save();
            $sshUser = 'root';
            $sshHost = '10.0.1.123';
            $password = 'Parkin@4321';

            $pythonExecutable = '/root/venv/bin/python3';
            $pythonScriptPath = '/root/test2.py';
            // $pythonScriptPath = '/root/test2_detect_object.py';
            $folderPath = '/root/slot_images/new_parkin_slot_images_501_1000';

            $command = "source /root/venv/bin/activate && YOLO_CONFIG_DIR=/root/tmp/yoloconfig PADDLEOCR_HOME=/root/tmp/paddleocr MPLCONFIGDIR=/root/tmp/matplotlib "
            . "$pythonExecutable $pythonScriptPath $folderPath 2>&1";

            $ssh = new SSH2($sshHost);
            if (!$ssh->login($sshUser, $password)) 
            {
                throw new \Exception("SSH login failed");
            }

            $output = $ssh->exec($command); 

            unset($ssh);  

            $ssh = new SSH2($sshHost);
            if (!$ssh->login($sshUser, $password)) 
            {
                throw new \Exception("SSH login failed on second connection");
            }

            $filePath = '/root/output.json';
         
            $waitTime = 300;
            $fileFound = false;
            $oldMTime = trim($ssh->exec("[ -f $filePath ] && stat -c %Y $filePath || echo 0"));

            for ($i = 0; $i < $waitTime; $i++) 
            {
                $newMTime = trim($ssh->exec("[ -f $filePath ] && stat -c %Y $filePath || echo 0"));
            
                if ($newMTime > $oldMTime) 
                {
                    $exists = trim($ssh->exec("[ -s $filePath ] && echo 1 || echo 0"));
                    if ($exists === '1') 
                    {
                        $fileFound = true;
                        break;
                    }
                }
            
                sleep(1);
            }

            if (!$fileFound) 
            {
                \Log::error("Output file not found after waiting {$waitTime} seconds");
                $this->fail(new \Exception("Output file not generated"));
                return;
            }

            $jsonOutput = $ssh->exec("cat $filePath");
            if (str_contains(strtolower($output), 'error')) 
            {
                $this->fail(new \Exception("Python script failed: " . $output));
                return;
            }

            $json = json_decode($jsonOutput, true);

            if (json_last_error() !== JSON_ERROR_NONE) 
            {
                \Log::error("JSON Decode Failed: " . json_last_error_msg());
            } 
            else 
            {
                \Log::info("Job done successfully");
            
                $casesStatus = "";
                $casesVehicle = "";
                $casesImage = "";
                $casesChangeSlot = "";
                $ids = [];

                foreach ($json as $data) 
                {
                    $id = (int) $data['slot_number'];
                    $vehicleNumberRaw = $data['vehicle_number'];
                    $vehicleNumber = preg_replace("/[^A-Za-z0-9]/", "", $vehicleNumberRaw);

                    if (strtoupper(substr($vehicleNumber, 0, 1)) === 'E' || strtoupper(substr($vehicleNumber, 0, 1)) === 'F') 
                    {
                        $vehicleNumber = substr($vehicleNumber, 1);
                    }

                    if (strtoupper(substr($vehicleNumber, 0, 1)) === 'P') 
                    {
                        $nextChar = strtoupper(substr($vehicleNumber, 1, 1));
                        if ($nextChar !== 'B' && $nextChar !== 'Y') 
                        {
                            $vehicleNumber = substr($vehicleNumber, 1);
                        }
                    }

                    if (strtoupper(substr($vehicleNumber, 0, 1)) === 'A') 
                    {
                        $nextChar = strtoupper(substr($vehicleNumber, 1, 1));
                        if ($nextChar !== 'N' && $nextChar !== 'P' && $nextChar !== 'R' && $nextChar !== 'S') 
                        {
                            $vehicleNumber = substr($vehicleNumber, 1);
                        }
                    }

                    if (strtoupper(substr($vehicleNumber, 0, 1)) === 'R') 
                    {
                        $nextChar = strtoupper(substr($vehicleNumber, 1, 1));
                        if ($nextChar !== 'J') 
                        {
                            $vehicleNumber = 'K' . substr($vehicleNumber, 1);
                        }
                    }

                    if (strtoupper(substr($vehicleNumber, 0, 1)) === 'X') 
                    {
                        $vehicleNumber = 'K' . substr($vehicleNumber, 1);
                    }

                    if (strtoupper(substr($vehicleNumber, 0, 1)) === 'L') 
                    {
                        $vehicleNumber = 'K' . $vehicleNumber;
                    }

                    $status = (int) $data['status'];  
                    $plateNumber = ($status == 1) ? NULL : $vehicleNumber;
                    $imageValue = ($status == 1) ? NULL : $id;

                    $casesStatus .= "WHEN {$id} THEN '{$status}' ";
                    $casesVehicle .= "WHEN {$id} THEN " . ($plateNumber ? "'{$plateNumber}'" : "NULL") . " ";
                    $casesImage .= "WHEN {$id} THEN " . ($plateNumber ? "'storage/new_parkin_slot_images_501_1000/{$imageValue}.jpg'" : "NULL") . " ";

                    $casesChangeSlot .= "WHEN {$id} THEN '" . Carbon::now() . "' ";
                    
                    $ids[] = $id;
                }

                if (count($ids) > 0) {
                    $idList = implode(',', $ids);
                    $sql = "
                        UPDATE parking_slots
                        SET
                            status = CASE id {$casesStatus} END,
                            vehicle_number_plate = CASE id {$casesVehicle} END,
                            vehicle_image = CASE id {$casesImage} END,
                            change_slot = CASE id {$casesChangeSlot} END
                        WHERE id IN ({$idList})
                    ";

                    DB::statement($sql);
                }
        }

        }
        catch (\Exception $e) 
        {
            \Log::error("Job failed: " . $e->getMessage());
            throw $e;
        } 
        finally 
        {
            ParkingSlot::where('id', 1)->update(['is_checked' => 0]);
        }
    }
 }
 