<?php

namespace App\Http\Controllers\User;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();

        return view('Administration.Users.index', [
            'admins' => $admins
        ]);
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
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Admin $usuario
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Admin $usuario)
    {
        $rules = [
            'name' => 'string|max:50',
            'lastname' => 'string|max:50',
            'isSuper' => 'boolean',
        ];

        $this->validate($request, $rules);

        if ($request->has('name')) {
            $usuario->name = $request->get('name');
        }

        if ($request->has('lastname')) {
            $usuario->lastname = $request->get('lastname');
        }

        if ($request->has('isSuper')) {
            $usuario->isSuper = $request->get('isSuper');
        }

        if ($request->has('phone')) {
            $usuario->phone = $request->get('phone');
        }

        $usuario->save();

        return redirect(route('usuarios.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Admin $usuario
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Admin $usuario)
    {
        $usuario->delete();

        return redirect(route('usuarios.index'));
    }
}
