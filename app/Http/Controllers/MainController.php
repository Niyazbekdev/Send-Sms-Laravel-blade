<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        return redirect('dashboard');
    }

    public function dashboard()
    {
        return view('dashboard')->with([
            'workers' => Worker::select('id', 'name', 'phone', 'birth')->get(),
        ]);
    }
}
