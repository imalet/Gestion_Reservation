<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Models\User;
use Illuminate\Http\Request;
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
