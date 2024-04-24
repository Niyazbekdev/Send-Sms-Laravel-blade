<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;
use App\Jobs\SendSmsJob;
use App\Models\Worker;
use Carbon\Carbon;

class WorkerController extends Controller
{
    public function store(StoreWorkerRequest $request)
    {
        $data = $request->validated();

        $worker = Worker::create($data);

        SendSmsJob::dispatchSync($worker);

        return redirect()->back();
    }
}
