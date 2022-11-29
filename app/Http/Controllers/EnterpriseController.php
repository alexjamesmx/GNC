<?php

namespace App\Http\Controllers;
use App\Models\Enterprise;
use App\Models\Parque;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class EnterpriseController extends Controller
{

    public function home()
    {
        $enterprises = Enterprise::join('parques','enterprises.parque_id', '=', 'parques.id')->where('enterprises.status_id', '!=', '1')->paginate(10);
        $parques = Parque::where('status_id', '!=', '1')->get();
        if (session()->has('message')) {
            session()->keep('message');
            return view('admin.admin', ['enterprises' => $enterprises, 'section' => 'empresas', 'section_cute' => 'Empresas','parques' => $parques]);
        }
        return view('admin.admin', ['enterprises' => $enterprises, 'section' => 'enterprises', 'section_cute' => 'Empresas','parques' => $parques]);
    }
    public function delete($id)
    {
        $response = Enterprise::where('id', $id)->update(['status_id' => 1]);
        return response()->json(['response' =>  $response], 200);
    }
    
    public function store(Request $request)
    {
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        $validate = Validator::make(
            $request->all(),
            [
                'enterprise' => 'required|max:255|unique:enterprises,enterprise',
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
                'enterprise.required' => 'El nombre de la empresa es requerido.',
                'enterprise.max' => 'El nombre de la empresa no debe exceder de 255 caracteres.',
                'enterprise.unique' => 'El nombre del parque ya existe.',

                'razon_social.required' =>'La razón social es requerida.',
                'razon_social.max' => 'La razón social no debe exceder 255 caracteres.',

                'rfc.required' =>'El RFC es requerido.',
                'rfc.max' => 'El RFC no debe exceder de 13 caracteres.',
                'rfc.min' => 'El RFC debe contar con 12 o 13 carctetes',
                'rfc.unique' => 'Esta RFC ya está registrado.',

                'address.required' => 'La dirección es requerida.',
                'address.max' => 'La dirección no debe exceder 255 caracteres.',

                'ciudad.required' => 'La ciudad es requerido.',
                'ciudad.max' => 'La ciudad no debe exceder 255 caracteres.',

                'cp.required' => 'El C.P. es requerido.',
                'cp.max' => 'El C.P. no debe exceder 255 caracteres.',
                
                'regimen_fiscal.required' => 'El régimen fiscal es requerido.',
                'regimen_fiscal.max' => 'El régimen fiscal no debe exceder 255 caracteres.',

                'phone.required' => 'El teléfono es requerido.',
                'phone.max' => 'El teléfono no debe exceder 50 caracteres.',
                'phone.unique' => 'El teléfono ya está registrado.',
                'phone.numeric' => 'El teléfono debe ser numérico.',
                
                'fax.max' => 'El fax no debe exceder 255 caracteres.',

                'location.max' => 'La ubicación no debe exceder 255 caracteres.',
                     
                'user_id.required' => 'El admnistrador de la empresa es requerido.',
                'user_id.max' => 'El administrador de la empresa no debe exceder 255 caracteres.',
                 
                'parque_id.required' => 'El parque es requerido',
                'parque_id.not_in' => 'El parque es requerido',
                'parque_id.max' => 'El parque no debe exceder 255 caracteres.',

            ]
        );
        if ($validate->fails()) {
            $input = $request->except(['id', '_token', '_method']);
            return response()->json(['response' => false, 'errors' => $validate->errors(), 'input' => $input]);
        }
        $parque = new Enterprise();
        $parque->create($request->except('_token', 'id'));
        return response()->json(['response' => true,]);
    }
}
