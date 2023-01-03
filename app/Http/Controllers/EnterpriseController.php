<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use App\Models\Parque;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class EnterpriseController extends Controller
{

    public function home()
    {
        $enterprises = Enterprise::select('enterprises.id as enterprise_id', 'parques.id as parque_id', 'enterprises.*', 'parques.*', 'users.id as user_id', 'users.*')->join('parques', 'enterprises.parque_id', '=', 'parques.id')->join('users', 'enterprises.user_id', '=', 'users.id')->where('enterprises.status_id', '!=', '1')->orderBy('parques.parque')->paginate(10);


        $parques = Parque::where('status_id', '!=', '1')
            ->get();
        $users = DB::table('users')->whereNotExists(function ($query) {
            $query->select('user_id')
                ->where('status_id', '!=', '1')
                ->from('enterprises')
                ->whereColumn('enterprises.user_id', 'users.id');
        })->where('status_id', '!=', '1')->get();

        $user_empresas = DB::table('users')->whereNotExists(function ($query) {
            $query->select('user_id')
                ->where('status_id', '!=', '1')
                ->from('enterprises')
                ->whereColumn('enterprises.user_id', 'users.id');
        })->where('status_id', '!=', '1')
            ->where('role_id', '=', '2')->get();

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

        return view('admin.admin', ['enterprises' => $enterprises, 'section' => 'enterprises', 'section_cute' => 'Empresas', 'parques' => $parques, 'users' => $users, 'user_empresas' => $user_empresas, 'role' => $role, 'role_type' => $role_type]);
    }
    public function delete($id)
    {
        $response = Enterprise::where('id', $id)->update(['status_id' => 1]);
        return response()->json(['response' =>  $response], 200);
    }

    public function validated(Request $request)
    {
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        $already_exists = Enterprise::where('parque_id', $request->parque_id)->where('enterprise', $request->enterprise)->first();

        $exists = 'required|max:255';
        $already_exists = $already_exists === null ? '' : '|unique:enterprises,enterprise';
        $name_str = $exists . $already_exists;

        $validate = Validator::make(
            $request->all(),
            [
                'enterprise' => $name_str,
                'razon_social' => 'required|max:255',
                'rfc' => 'required|max:13|min:12|unique:enterprises,rfc',
                'address' => 'required|max:255',
                'ciudad' => 'required|max:255',
                'cp' => 'required|max:255',
                'regimen_fiscal' => 'required|max:255',
                'phone' => 'required|numeric|digits_between:1,20|unique:enterprises,phone',
                'fax' => 'max:255',
                'location' => 'max:255',
                'user_id' => 'required|max:255',
                'parque_id' => 'required|not_in:0|max:255',
            ],
            [
                'enterprise.required' =>  'Este campo es requerido',
                'enterprise.max' => 'El nombre de la empresa no debe exceder de 255 caracteres.',
                $already_exists === null ? '' : 'enterprise.unique' =>  $already_exists === null ? '' : 'Esta empresa ya existe en este parque.',

                'razon_social.required' => 'Este campo es requerido',
                'razon_social.max' => 'La razón social no debe exceder 255 caracteres.',

                'rfc.required' => 'Este campo es requerido',
                'rfc.max' => 'El RFC no debe exceder de 13 caracteres.',
                'rfc.min' => 'El RFC debe contar con 12 o 13 carctetes',
                'rfc.unique' => 'Este RFC ya está registrado.',

                'address.required' => 'Este campo es requerido',
                'address.max' => 'La dirección no debe exceder 255 caracteres.',

                'ciudad.required' => 'Este campo es requerido.',
                'ciudad.max' => 'La ciudad no debe exceder 255 caracteres.',

                'cp.required' => 'Este campo es requerido',
                'cp.max' => 'El C.P. no debe exceder 255 caracteres.',

                'regimen_fiscal.required' => 'Este campo es requerido.',
                'regimen_fiscal.max' => 'El régimen fiscal no debe exceder 255 caracteres.',

                'phone.required' => 'Este campo es requerido.',
                'phone.max' => 'El teléfono no debe exceder 50 caracteres.',
                'phone.unique' => 'El teléfono ya está registrado.',
                'phone.numeric' => 'El teléfono debe ser numérico.',
                'phone.digits_between' => 'El teléfono debe tener entre 1 y 20 dígitos.',

                'fax.max' => 'El fax no debe exceder 255 caracteres.',

                'location.max' => 'La ubicación no debe exceder 255 caracteres.',

                'user_id.required' => 'Este campo es requerido',
                'user_id.max' => 'El administrador de la empresa no debe exceder 255 caracteres.',

                'parque_id.required' => 'Este campo es requerido',
                'parque_id.not_in' => 'El parque es requerido',
                'parque_id.max' => 'El parque no debe exceder 255 caracteres.',

            ]
        );
        if ($validate->fails()) {
            $input = $request->except(['id', '_token', '_method']);
            return response()->json(['response' => false, 'errors' => $validate->errors(), 'input' => $input]);
        }
        return response()->json(['response' => true,]);
    }
    public function validated_update(Request $request)
    {
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        $already_exists = Enterprise::where('parque_id', '=', $request->parque_id)->where('enterprise', '=', $request->enterprise)->where('id', '!=', $request->id)->first();
        $exists = 'required|max:255';
        $already_exists = $already_exists === null ? '' : '|unique:enterprises,enterprise,' .  $request->parque_id;
        $name_str = $exists . $already_exists;
        $validate = Validator::make(
            $request->all(),
            [
                'enterprise' => $name_str,
                'razon_social' => 'required|max:255',
                'rfc' => 'required|max:13|min:12|unique:enterprises,rfc,' . $request->id,
                'address' => 'required|max:255',
                'ciudad' => 'required|max:255',
                'cp' => 'required|max:255',
                'regimen_fiscal' => 'required|max:255',
                'phone' => 'required|numeric|digits_between:1,20|unique:enterprises,phone,' . $request->id,
                'fax' => 'max:255',
                'location' => 'max:255',
                'user_id' => 'required|max:255',
                'parque_id' => 'required|not_in:0|max:255',
            ],
            [
                'enterprise.required' =>  'Este campo es requerido',
                'enterprise.max' => 'El nombre de la empresa no debe exceder de 255 caracteres.',
                $already_exists === null ? '' : 'enterprise.unique' =>  $already_exists === null ? '' : 'Esta empresa ya existe en este parque.',

                'razon_social.required' => 'Este campo es requerido',
                'razon_social.max' => 'La razón social no debe exceder 255 caracteres.',

                'rfc.required' => 'Este campo es requerido',
                'rfc.max' => 'El RFC no debe exceder de 13 caracteres.',
                'rfc.min' => 'El RFC debe contar con 12 o 13 carctetes',
                'rfc.unique' => 'Este RFC ya está registrado.',

                'address.required' => 'Este campo es requerido',
                'address.max' => 'La dirección no debe exceder 255 caracteres.',

                'ciudad.required' => 'Este campo es requerido.',
                'ciudad.max' => 'La ciudad no debe exceder 255 caracteres.',

                'cp.required' => 'Este campo es requerido',
                'cp.max' => 'El C.P. no debe exceder 255 caracteres.',

                'regimen_fiscal.required' => 'Este campo es requerido.',
                'regimen_fiscal.max' => 'El régimen fiscal no debe exceder 255 caracteres.',

                'phone.required' => 'Este campo es requerido.',
                'phone.max' => 'El teléfono no debe exceder 50 caracteres.',
                'phone.unique' => 'El teléfono ya está registrado.',
                'phone.numeric' => 'El teléfono debe ser numérico.',
                'phone.digits_between' => 'El teléfono debe tener entre 1 y 20 dígitos.',

                'fax.max' => 'El fax no debe exceder 255 caracteres.',

                'location.max' => 'La ubicación no debe exceder 255 caracteres.',

                'user_id.required' => 'Este campo es requerido',
                'user_id.max' => 'El administrador de la empresa no debe exceder 255 caracteres.',

                'parque_id.required' => 'Este campo es requerido',
                'parque_id.not_in' => 'El parque es requerido',
                'parque_id.max' => 'El parque no debe exceder 255 caracteres.',

            ]
        );
        if ($validate->fails()) {
            $input = $request->except(['id', '_token', '_method']);
            return response()->json(['response' => false, 'errors' => $validate->errors(), 'input' => $input]);
        }
        return response()->json(['response' => true,]);
    }


    public function store(Request $request)
    {
        $enterprise = new Enterprise();
        $enterprise->create($request->except('id'));
        return response()->json(['response' => true,]);
    }
    public function update_enterprise(Request $request, $id)
    {
        $response = Enterprise::where('id', $id)->update($request->except('id'));
        return response()->json(['response' => true], 200); //BOLLEAN
    }
    public function get($id)
    {
        $enterprise = Enterprise::where('id', $id)->firstOrFail();
        if (!count(array($enterprise)) === 0) {
            return response()->json(['response' => false]);
        }
        return response()->json($enterprise);
    }
    public function get_user($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        if (!count(array($user)) === 0) {
            return response()->json(['response' => false]);
        }
        return response()->json($user);
    }
    public function get_parque($id)
    {
        $parque = Parque::where('id', $id)->firstOrFail();
        if (!count(array($parque)) === 0) {
            return response()->json(['response' => false]);
        }
        return response()->json($parque);
    }
}
