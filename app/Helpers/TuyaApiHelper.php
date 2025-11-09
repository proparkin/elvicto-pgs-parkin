<?php

namespace App\Helpers;

class TuyaApiHelper
{
    // Get current timestamp in milliseconds
    public static function getCurrentTimestamp() 
    {
        return round(microtime(true) * 1000);
    }

    // Generate a random nonce
    public static function generateNonce()
    {
        return bin2hex(random_bytes(16));
    }

    // Generate the string to sign for GET request
    public static function generateStringToSign($query, $path)
    {
        $method = 'GET';
        $sha256Hash = hash('sha256', '');
        $url = $path . ($query ? '?' . $query : '');

        return "{$method}\n{$sha256Hash}\n\n{$url}";
    }

    // Generate the string to sign for POST request
    public static function generateStringToSignSetColor($body, $path) 
    {
        $method = 'POST';
        $sha256Hash = hash('sha256', $body);  
        $url = $path; 

        return "{$method}\n{$sha256Hash}\n\n{$url}";
    }

    // Calculate signature for the GET request
    public static function calculateSignature($clientId,$accessToken = null, $timestamp, $nonce, $stringToSign, $secret)
    {
        $signingString = $clientId . $accessToken . $timestamp . $nonce . $stringToSign;
        return strtoupper(hash_hmac('sha256', $signingString, $secret));
    }
}
