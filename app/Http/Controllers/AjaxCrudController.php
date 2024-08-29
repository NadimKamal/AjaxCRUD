<?php

namespace App\Http\Controllers;

use App\Models\AjaxCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AjaxCrudController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        // dd($users);
        return view('index');
    }

    public function ajaxData() {
        $users = AjaxCrud::latest()->get();
        return response()->json([
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:ajax_cruds',
        ]);
        AjaxCrud::create([
            'uuid'  => Str::uuid(),
            'name'  => $request->name,
            'email' => $request->email,
        ]);
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'msg'     => 'Successfully created.',
            ]);
        }

        // return view('index');

        // $user = new AjaxCrud();

        // $user->name = $request->name;
        // $user->email = $request->email;

        // $user->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(AjaxCrud $ajaxCrud) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($uuid) {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $uuid) {

        $user = AjaxCrud::where('uuid', $uuid)->first();

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:ajax_cruds,email,'.$user->uuid,
        ]);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        // return response()->json([
        //     'user' => $user,
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AjaxCrud $ajaxCrud, $uuid) {

        $user = AjaxCrud::where('uuid',$uuid)->first();

        $user->delete();
    }
}
