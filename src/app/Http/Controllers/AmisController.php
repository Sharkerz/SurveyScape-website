<?php

namespace App\Http\Controllers;

use App\User;
use App\Amis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use View;

class AmisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $list = Amis::where('user1', '=', $user_id)
            ->where('pending', '=', 1)
            ->orWhere('user2', '=', $user_id)
            ->where('pending', '=', 1)
            ->get();

        $amis = [];

        for($i = 0; $i <= count($list)-1; $i++) {
            if($user_id == $list[$i]['user1']) {
                array_push($amis, $list[$i]['user2']);
            }
            else if ($user_id == $list[$i]['user2']) {
                array_push($amis, $list[$i]['user1']);
            }
        }

        $name = [];

        foreach ($amis as $id_amis) {
            $name[$id_amis] = User::where('id', '=', $id_amis)->first()->name;
        }

        return View::make('Amis.index')->with(['amis' => $amis, 'name' => $name ]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        /* Si l'input est un email */
        if(strpos($request->input('name'), '@') !== false) {
            if(Auth::user()->email != $request->input('name')) {
                if (User::where('email', '=', $request->input('name'))->exists()) {
                    $id_user2 = $request->input('name');
                    $id = User::where('email', $id_user2)->first()->id;
                    Amis::create([
                        "user1" => Auth::id(),
                        "user2" => $id,
                        "pending" => 0,
                    ]);
                    return Redirect::route('Amis.index');
                }
                else {
                    return Redirect::route('Amis.index');
                }
            }
            else {
                return Redirect::route('Amis.index');
            }
    }
        /* Si l'input est un pseudo */
        else {
            if(Auth::user()->name != $request->input('name')) {
                if (User::where('name', '=', $request->input('name'))->exists()) {
                    $id_user2 = $request->input('name');
                    $id = User::where('name', $id_user2)->first()->id;
                    Amis::create([
                        "user1" => Auth::id(),
                        "user2" => $id,
                        "pending" => 0,
                    ]);
                    return Redirect::route('Amis.index');
                }
                else {
                    return Redirect::route('Amis.index');
                }
            }
            else {
                return Redirect::route('Amis.index');
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Amis  $amis
     * @return \Illuminate\Http\Response
     */
    public function show(Amis $amis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Amis  $amis
     * @return \Illuminate\Http\Response
     */
    public function edit(Amis $amis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Amis  $amis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Amis $amis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Amis  $amis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Amis $amis)
    {
        //
    }

    public function accepter(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id_ami');

            $this->validate($request, [
                'id_ami' => 'required',
            ]);
            Amis::where('user1', $id)
                ->update(['pending' => 1]);

            return response()->json(['accepter'=>$id], 200);
        }
        abort(404);
    }

    public function refuser(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->input('id_ami');

            $this->validate($request, [
                'id_ami' => 'required',
            ]);
            Amis::where('user1', $id)
                ->where('user2', Auth::id())
                ->delete();

            return response()->json(['refuser'=>$id], 200);
        }
        abort(404);
    }

    public function delete_friend(Request $request)
    {
        if ($request->ajax()) {
            $id_ami = $request->input('id_ami');

            Amis::where('user1', $id_ami)
                ->where('user2', Auth::id())
                ->delete();

            Amis::where('user2', $id_ami)
                ->where('user1', Auth::id())
                ->delete();

            return response()->json(['supprime'=>$id_ami], 200);
        }
        abort(404);
    }
}
