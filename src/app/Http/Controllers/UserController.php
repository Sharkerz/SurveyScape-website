<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('profil.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show(profil $profil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();

        // Si l'email ne change pas
        if(Auth::user()->email == request('email')) {

            $this->validate(request(), [
                'name' => 'required',
                'password' => 'required|min:6'
            ]);

            $user->name = request('name');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();

        }
        // Si l'email change
        else{

            $this->validate(request(), [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6|confirmed'
            ]);

            $user->name = request('name');
            $user->email = request('email');
            $user->password = bcrypt(request('password'));

            $user->save();

            return back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy(profil $profil)
    {
        //
    }

    public function update_avatar(Request $request) {
        // upload avatar img
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/avatar/' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return back();
    }

    public function update_password(Request $request) {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // Le mot de passe est incorrect
            return redirect()->back()->with("error","Le mot de passe que vous avez entré n'est pas correct.");
        }

        if(strcmp($request->get('current_password'), $request->get('password')) == 0){
            //Le nouveau mot de passe est identique a l'ancien
            return redirect()->back()->with("error","Votre nouveau mot de passe ne peut être identique à l'ancien.");
        }

        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        //Changement du mot de passe
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success","Mot de passe modifié avec succès");

    }
}
