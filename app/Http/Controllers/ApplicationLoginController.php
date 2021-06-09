<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\Application;

class ApplicationLoginController extends Controller
{
    public function __invoke(Application $application)
    {
       // dd($application->url);
       \Log::info($application->url);
        $response = Http::withHeaders(['token' => $application->token])
                        ->post($application->url, ['user' => Auth::user()]);

        // $response = Http::withHeaders(['token' => $application->token])
        //                 ->post('localhost:9003/login', ['user' => Auth::user()]);

        \Log::info($response->json()['redirect']);

        return redirect($response->json()['redirect']);
    }
}
