<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
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
            return redirect()->route('welcome');
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
    public function storeUser(Request $request)
    {

        $newUser = new User();
        $newUser->firstName = $request->firstName;
        $newUser->lastName = $request->firstName;
        $newUser->email = $request->email;
        $newUser->phoneNumber = $request->phoneNumber;
        $newUser->password = $request->password;

        $newUser->save();

        return back();
    }

    /**
     * Store a newly created user resource in storage.
     */
    public function storeAssociation(Request $request)
    {
        // dd($request->logo->extension());

        $fileName = time() . '.' . $request->logo->extension();


        $image = $request->file('logo')->storeAs(
            'logo',
            $fileName,
            'public'
        );

        $newUser = new Association();
        $newUser->name = $request->name;
        $newUser->slogan = $request->slogan;
        $newUser->logo = $image;
        $newUser->email = $request->email;
        $newUser->password = Hash::make($request->password);

        $newUser->save();

        return back();
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
