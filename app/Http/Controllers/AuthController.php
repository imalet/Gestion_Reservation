<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssociationRequest;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\loginRequest;
use App\Models\Association;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the login page.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Show the login page.
     */
    public function authentification(loginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::guard('association')->attempt($credentials)) {
           
            return redirect()->route('welcome');
        } elseif (Auth::guard('web')->attempt($credentials)) {
    
            return redirect('/');
        } else {
            dd("Bad");
        }


        // if ($request->status === 'user') {
        //     if (Auth::attempt($credentials)) {

        //         $request->session()->regenerate();
        //         return redirect()->route('welcome');
        //     }
        //     return back();
        // } else {

        //     if ($association && Hash::check($request->password, $association->password)) {
        //         $request->session()->regenerate();
        //         return redirect()->route('welcome');
        //     } else {
        //         return back();
        //     }
        // }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function createAssociationAccount()
    {
        return view('auth.registerAssociation');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createUserAccount()
    {
        return view('auth.registerUser');
    }

    /**
     * Store a newly created user resource in storage.
     */
    public function storeUser(ClientRequest $request)
    {

        $credentials = $request->validated();

        $newUser = new User();
        $newUser->firstName = $credentials['firstName'];
        $newUser->lastName = $credentials['firstName'];
        $newUser->email = $credentials['email'];
        $newUser->phoneNumber = $credentials['phoneNumber'];
        $newUser->password = Hash::make($credentials['password']);

        $newUser->save();

        return redirect()->route('login.authentification');
    }

    /**
     * Store a newly created user resource in storage.
     */
    public function storeAssociation(AssociationRequest $request)
    {
 

        $credentials = $request->validated();
        
        $fileName = time() . '.' . $request->logo->extension();

        $image = $request->file('logo')->storeAs(
            'logo',
            $fileName,
            'public'
        );

        $newUser = new Association();
        $newUser->name = $credentials['name'];
        $newUser->slogan = $credentials['slogan'];
        $newUser->logo = $image;
        $newUser->email = $credentials['email'];
        $newUser->password = Hash::make($credentials['password']);

        $newUser->save();

        return redirect()->route('login.authentification');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
