<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SendSmsController extends Controller
{
    public function sendSms()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken(),
        ])->post('notify.eskiz.uz/api/message/sms/send', [
            'mobile_phone' => '998907056963',
            'message' => "Bu Eskiz dan test",
            'from' => 4546
        ]);

        return $response->json();
    }

    public function getToken()
    {
        $token = Cache::get('eskiz_api_token');

        if (! $token){
            $response = Http::post('notify.eskiz.uz/api/auth/login', [
                'email' => "niyazbekk001@gmail.com",
                'password' => "CBBLO2w3YgTYc7kYCt298jUqoB58YiggfNIlunlF",
            ]);
            $token = $response['data']['token'];

            Cache::put('eskiz_api_token', $token, now()->addDays(30));
        }

        return $token;
    }
}
