<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DisplayCountController extends Controller
{
    private $appKey = "25fc9c92b838428f842f6d982ee8b5e7";
    private $appSecret = "0f02261bf1224ad2bc85d4d6fc610f8f";

    // Step 1: Get Player List
    private function getPlayerList()
    {
        $url = "https://open-in.vnnox.com/v2/player/list";
        $curTime = time();
        $nonce = uniqid();
        $checkSum = hash('sha256', $this->appSecret . $nonce . $curTime);

        $headers = [
            "AppKey: {$this->appKey}",
            "Nonce: $nonce",
            "CurTime: $curTime",
            "CheckSum: $checkSum",
            "Content-Type: application/x-www-form-urlencoded"
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true);
    }

    // Step 2: Get Image Info (size + md5)
    private function getImageSizeAndMd5($imageUrl)
    {
        $imageData = @file_get_contents($imageUrl);
        if (!$imageData) {
            return null;
        }

        return [
            'size' => strlen($imageData),
            'md5' => md5($imageData)
        ];
    }

    private function pushImageOnly($playerIds)
{
    $url = "https://open-in.vnnox.com/v2/player/program/normal";
    $curTime = time();
    $nonce = uniqid();
    $checkSum = hash('sha256', $this->appSecret . $nonce . $curTime);

    $imageUrl = "https://vnnox-public.oss-cn-qingdao.aliyuncs.com/myf/test.jpg";
    $imgInfo = $this->getImageSizeAndMd5($imageUrl);
    if (!$imgInfo) {
        return ['status' => false, 'message' => 'Cannot fetch image'];
    }

    $imageSize = $imgInfo['size'];
    $imageMd5 = $imgInfo['md5'];

    $payload = [
        "playerIds" => $playerIds,
        "schedule" => [
            "startDate" => date('Y-m-d'),
            "endDate" => date('Y-m-d', strtotime('+1 day')),
            "plans" => [
                [
                    "weekDays" => [0,1,2,3,4,5,6],
                    "startTime" => "00:00:00",
                    "endTime" => "23:59:59"
                ]
            ]
        ],
        "pages" => [
            [
                "name" => "ImagePage",
                "widgets" => [
                    [
                        "zIndex" => 1,
                        "type" => "PICTURE",
                        "size" => $imageSize,
                        "md5" => $imageMd5,
                        "duration" => 10000,
                        "url" => $imageUrl,
                        "layout" => [
                            "x" => "0%",
                            "y" => "0%",
                            "width" => "100%",
                            "height" => "100%"
                        ],
                        "inAnimation" => [
                            "type" => "NONE",
                            "duration" => 1000
                        ]
                    ]
                ]
            ]
        ]
    ];

    $headers = [
        "AppKey: {$this->appKey}",
        "Nonce: $nonce",
        "CurTime: $curTime",
        "CheckSum: $checkSum",
        "Content-Type: application/json"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}


    // Step 4: Public API to Call From Route
    public function updateDisplayWithImageAndText()
    {
        $playerData = $this->getPlayerList();

        if (!$playerData || !isset($playerData['rows'])) {
            return response()->json([
                'status' => false,
                'message' => 'Unable to fetch player list'
            ]);
        }

        $playerIds = [];
        $onlineCount = 0;
        $offlineCount = 0;

        foreach ($playerData['rows'] as $row) {
            $playerIds[] = $row['playerId'];
            if ($row['onlineStatus'] == 1) {
                $onlineCount++;
            } else {
                $offlineCount++;
            }
        }

        if (empty($playerIds)) {
            return response()->json([
                'status' => false,
                'message' => 'No players found'
            ]);
        }

        $pushResponse = $this->pushImageOnly($playerIds);

        return response()->json([
            'status' => true,
            'online' => $onlineCount,
            'offline' => $offlineCount,
            'playerCount' => count($playerIds),
            'pushResponse' => $pushResponse
        ]);
    }
}
