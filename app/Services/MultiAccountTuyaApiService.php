<?php 
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Helpers\TuyaApiHelper;

class MultiAccountTuyaApiService
{
    protected $accessId;
    protected $appSecret;
    protected $baseUrl;
    protected $accessToken;
    protected $timestamp;
    protected $nonce;

     public function __construct($clientId, $secret, $apiUrl = 'https://openapi.tuyain.com')
    {
        $this->accessId = $clientId;
        $this->appSecret = $secret;
        $this->baseUrl = $apiUrl;
        $this->timestamp = TuyaApiHelper::getCurrentTimestamp();
        $this->nonce = TuyaApiHelper::generateNonce();
        $this->getAccessToken();
    }

    private function getHeaders($signature, $accessToken = null)
    {
        return [
            'client_id' => $this->accessId,
            'sign' => $signature,
            't' => $this->timestamp,
            'nonce' => $this->nonce,
            'sign_method' => 'HMAC-SHA256',
            'access_token' => $accessToken
        ];
    }

    public function getAccessToken()
    {
        $path = '/v1.0/token';
        $url = $this->baseUrl . $path;
        $query = http_build_query(['grant_type' => 1]);

        $stringToSign = TuyaApiHelper::generateStringToSign($query, $path);
        $signature = TuyaApiHelper::calculateSignature($this->accessId, $accessToken = null, $this->timestamp, $this->nonce, $stringToSign, $this->appSecret);

        $response = Http::withHeaders($this->getHeaders($signature))->get($url, ['grant_type' => 1]);

        if ($response->successful()) 
        {
            $data = $response->json();
            $this->accessToken = $data['result']['access_token'];
        } 
        else 
        {
            throw new \Exception('Failed to get access token');
        }
    }

    public function getDeviceInfo($deviceId)
    {
        $path = "/v1.0/devices/{$deviceId}";
        $url = $this->baseUrl . $path;

        $stringToSign = TuyaApiHelper::generateStringToSign('', $path);
        $signature = TuyaApiHelper::calculateSignature($this->accessId, $this->accessToken, $this->timestamp, $this->nonce, $stringToSign, $this->appSecret);

        $response = Http::withHeaders($this->getHeaders($signature, $this->accessToken))->get($url);

        if ($response->successful()) 
        {
            return $response->json();
        } 
        else 
        {
            throw new \Exception('Failed to get device info');
        }
    }

    public function setDeviceInteraction($code, $value, $deviceId)
    {
        $path = "/v1.0/devices/{$deviceId}/commands"; 
        $url = $this->baseUrl . $path;

        $body = json_encode([
            'commands' => [
                [
                    'code' => $code,
                    'value' => $value
                ]
            ]
        ]);

        $stringToSign = TuyaApiHelper::generateStringToSignSetColor($body, $path);
        $signature = TuyaApiHelper::calculateSignature($this->accessId, $this->accessToken, $this->timestamp, $this->nonce, $stringToSign, $this->appSecret);

        $response = Http::withHeaders($this->getHeaders($signature, $this->accessToken))->post($url, json_decode($body, true));

        if ($response->successful()) 
        {
            return $response->json();
        } 
        else 
        {
            throw new \Exception('Failed to set device color');
        }
    }
}
