<?php

namespace App\Http\Controllers\User;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function create($token)
    {
        $admin = Admin::where('token_verification', $token)->get()->first();

        if (!isset($admin)) {
            return redirect(route('welcome'));
        }

        Auth::login($admin);

        return view('Administration.Users.register', [
            'admin' => $admin
        ]);
    }

    public function confirm(Request $request) {

        $rules = [
            'password'              => 'required',
            'password_confirmation' => 'required'
        ];
        $this->validate($request, $rules);

        if ($request->get('password') != $request->get('password_confirmation')) {
            return redirect()->back()->withInput()->withErrors([
                'password' => 'No son iguales'
            ]);
        }

        $admin = Admin::find($request->get('id'));
        $admin->password = $request->get('password');
        $admin->account_verified = Admin::ACCOUNT_VERIFIED;

        $admin->save();

        Auth::login($admin);

        return redirect(route('home'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'              => 'required|string|max:50',
            'lastname'          => 'required|string|max:50',
            'email'             => 'required|email|unique:admins',
            'document_type'     => 'required|string',
            'document_number'   => 'required|int',
            'isSuper'           => 'required',
            'phone'             => 'required'
        ];

        try{
            $this->validate($request, $rules);

            $admin = new Admin();
            $admin->name                = $request->get('name');
            $admin->lastname            = $request->get('lastname');
            $admin->email               = $request->get('email');
            $admin->document_type       = $request->get('document_type');
            $admin->document_number     = $request->get('document_number');
            $admin->phone               = $request->get('phone');
            $admin->isSuper             = $request->get('isSuper');
            $admin->isSuper             = $request->get('isSuper');
            $admin->account_verified    = Admin::ACCOUNT_NOT_VERIFIED;
            $admin->token_verification  = str_random(42);

            $admin->save();

            return redirect(route('usuarios.index'))->with([
                'message' => 'Usuario creado exitosamente'
            ]);
        }catch (\Exception $exception) {
            dd($exception);
        }

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
            'lastname' => 'string|max:50'
        ];

        $this->validate($request, $rules);

        try{
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
        } catch (\Exception $exception) {
            dd($exception);
        }

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
