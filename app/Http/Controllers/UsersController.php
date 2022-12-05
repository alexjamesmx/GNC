<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function home()
    {
        $users = User::where('status_id', '!=', '1')->orderBy('role_id', 'desc')->orderBy('status_id', 'desc')->paginate(10);
        $users_inactivos = User::where('status_id', '=', '1')->orderBy('role_id', 'desc')->orderBy('status_id', 'desc')->get();

        // $users = User::where('role_id','!=','1')->orderBy('role_id', 'desc')->get();

        if (session()->has('message')) {
            session()->keep('message');
        }

        $role_type = Auth::user()->role_id;
        if ($role_type === 1) {
            $role = 'Admin';
        } else if ($role_type === 2) {
            $role = 'Empresa';
        } else {
            $role = 'Técnico';
        }
        // dd($users[0]->status);
        return view('admin.admin', ['users' => $users, 'section' => 'users', 'section_cute' => 'Usuarios', 'role' => $role, 'users_inactivos' => $users_inactivos]);
    }

    public function get_user(Request $request)
    {
        $user = User::find($request->id);

        return response()->json($user);
    }
    public function store(Request $request)
    {
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        // $already_exists = Subestacion::where('subestacion','=', $request->subestacion)->where('enterprise_id','=', $request->enterprise_id)->where('parque_id','=', $request->parque_id)->where('type_id','=', $request->type_id)->first();

        // $exists = 'required|max:255';
        // $already_exists = $already_exists === null ? '' : '|unique:subestaciones,subestacion';
        // $name_str = $exists.$already_exists;

        $validated = Validator::make($request->except('id'), [
            'name' => 'required|max:255',
            'last_name' => 'required|max:255',
            "email" => "required|email|unique:users,email",
            'role_id' => 'required|between:1,3',
            'phone' => 'required|numeric',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            "name.required" => "Este campo es requerido",
            "name.max" => "Este campo no puede tener más de 255 caracteres",

            "last_name.required" => "Este campo es requerido",
            "last_name.max" => "Este campo no puede tener más de 255 caracteres",

            "email.required" => "Este campo es requerido",
            "email.email" => "Este campo debe ser un correo electrónico",
            "email.unique" => "Este correo electrónico ya está registrado",

            "role_id.required" => "Este campo es requerido",
            "role_id.between" => "El valor ingresado no está permitido",

            "phone.required" => "Este campo es requerido",
            "phone.numeric" => "Este campo debe ser un número",

            "password.required" => "Este campo es requerido",
            "password.min" => "Este campo debe tener al menos 8 caracteres",

            "password_confirmation.required" => "Este campo es requerido",
            "password_confirmation.same" => "Las contraseñas no coinciden",
        ]);

        if ($validated->fails()) {
            return response()->json(['response' => false, 'errors' => $validated->errors()]);
        }

        $user = new User;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->role_id = $request->role_id;
        $user->email = $request->email;
        $user->status_id = 2;
        $user->phone = $request->phone;
        $user->password = $request->password;

        return response()->json(['response' => $user->save()]);
    }
    public function disable(Request $request)
    {
        $user = User::find($request->id);
        $user->status_id = $request->status_id;
        return response()->json(['response' => $user->save()]);
    }
}
