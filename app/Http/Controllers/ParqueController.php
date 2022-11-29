<?php

namespace App\Http\Controllers;

use Session;
use App\Http\Requests\StoreParqueRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Parque;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class ParqueController extends Controller
{

    public function home()
    {
        $parques = Parque::where('status_id', '!=', '1')->paginate(10);
        if (session()->has('message')) {
            session()->keep('message');
            return view('admin.admin', ['parques' => $parques, 'section' => 'parques', 'section_cute' => 'Parques']);
        }
        return view('admin.admin', ['parques' => $parques, 'section' => 'parques', 'section_cute' => 'Parques']);
    }

    public function store(Request $request)
    {
        if (!$request->isMethod('post')) {
            return dd('error');
        }
        $validate = Validator::make(
            $request->all(),
            [
                'parque' => 'required|max:255|unique:parques,parque',
                'calle' => 'required|max:255',
                'municipio' => 'required|max:255',
                'codigo' => 'required|numeric',
            ],
            [
                'codigo.numeric' => 'El código postal debe ser un número.',
                'codigo.required' => 'El código postal es requerido.',

                'parque.required' => 'El nombre del parque es requerido.',
                'parque.max' => 'El nombre del parque no debe exceder de 255 caracteres.',
                'parque.unique' => 'El nombre del parque ya existe.',

                'calle.required' => 'La calle es requerida.',
                'calle.max' => 'La calle no debe exceder 255 caracteres.',

                'municipio.required' => 'El municipio es requerido.',
                'municipio.max' => 'El municipio no debe exceder 255 caracteres.',
            ]
        );
        if ($validate->fails()) {
            $input = $request->except(['id', '_token', '_method']);
            return response()->json(['response' => false, 'errors' => $validate->errors(), 'input' => $input]);
        }
        $parque = new Parque();
        $parque->create($request->except('_token', 'id'));
        return response()->json(['response' => true,]);
    }
    public function get($id)
    {
        $parque = Parque::where('id', $id)->firstOrFail();
        if (!count(array($parque)) === 0) {
            return response()->json(['response' => false]);
        }
        return response()->json($parque);
    }
    public function edit($id)
    {
    }
    public function actualizar(Request $request, $id)
    {

        $validate = Validator::make(
            $request->except('id'),
            [
                'parque' => 'required|max:255|unique:parques,parque,' . $request->id,
                'calle' => 'required|max:255',
                'municipio' => 'required|max:255',
                'codigo' => 'required|numeric',
            ],
            [
                'codigo.numeric' => 'El código postal debe ser un número.',
                'codigo.required' => 'El código postal es requerido.',

                'parque.required' => 'El nombre del parque es requerido.',
                'parque.max' => 'El nombre del parque no debe exceder de 255 caracteres.',
                'parque.unique' => 'El nombre del parque ya existe.',

                'calle.required' => 'La calle es requerida.',
                'calle.max' => 'La calle no debe exceder 255 caracteres.',

                'municipio.required' => 'El municipio es requerido.',
                'municipio.max' => 'El municipio no debe exceder 255 caracteres.',
            ]
        );
        if ($validate->fails()) {
            $input = $request->except(['_token', '_method']);
            return response()->json(['response' => false, 'errors' => $validate->errors(), 'input' => $input]);
            return back()->withErrors($validate->errors())->withInput($input)->with(['response' => false, 'modal' => 'update'])->with('id', $id);
        }
        //RESPONSE 1 || 0
        $response = Parque::where('id', $id)->update($request->except('_token', '_method', 'id'));
        return response()->json(['response' => true], 200);
    }
    public function destroy($id)
    {
    }

    public function delete($id)
    {
        $response = Parque::where('id', $id)->update(['status_id' => 1]);
        return response()->json(['response' =>  $response], 200);
    }
    public function message(Request $request)
    {
        if ($request->input('message') == 1) {
            session()->flash('message', '1');
        }
    }
}
