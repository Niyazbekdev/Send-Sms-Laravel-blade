<?php

namespace App\Jobs;

use App\Models\Worker;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class SendSmsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $bool = true;
        $workers = Worker::select('id', 'name', 'phone', 'birth',)->get();

        foreach ($workers as $worker){
            $dataString = $worker['birth'];
            $date = Carbon::parse($dataString);
            $formatDate = $date->format('m-d');

            if ($formatDate === now()->format('m-d')){
                Http::withHeaders([
                    'Authorization' => 'Bearer ' . $this->getToken(),
                ])->post('notify.eskiz.uz/api/message/sms/send', [
                    'mobile_phone' => $worker['phone'],
                    'message' => "Bu Eskiz dan test",
                    'from' => 4546
                ]);
            }
        }

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
