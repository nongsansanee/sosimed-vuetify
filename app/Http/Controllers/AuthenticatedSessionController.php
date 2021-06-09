<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use App\Models\Application;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('redirectAfterAuthenticated')) {
            $application = Application::where('url', 'like', $request->redirectAfterAuthenticated.'%')->first();
            Session::put('redirect-to-application', $application);
            \Log::info('has redirectAfterAuthenticated');
        }
        \Log::info('return login');
        return view('login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        // \Log::info('login store');
         \Log::info($request->all());
        // dd($request->all());
        // return "login";
        $user = User::whereLogin($request->username)->first();
        if (! $user || $request->username !== $request->password) {
            // throw ValidationException::withMessages([
            //     'login' => 'credentials not match our records',
            // ]);
            \Log::info('no user');
            return redirect('login');
        }

        \Log::info('found user');
        Auth::login($user);

        $application = Session::pull('redirect-to-application'); //pull  แล้วจะถูกลบ session นั้น เลย
        \Log::info('application-->');
        \Log::info($application);
        if ($application && $user->applications->contains($application)) {
            $response = Http::withHeaders(['token' => $application->token])
                        ->post($application->url, ['user' => Auth::user()])
                        ->json();

            return redirect($response['redirect']);
        }

        return redirect('portal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {

       \Log::info('logout');
        Auth::logout();

        return redirect('/login');
    }
}
