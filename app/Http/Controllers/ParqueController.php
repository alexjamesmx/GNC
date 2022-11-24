<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParqueRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Parque;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;


class ParqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parques = Parque::whereNotNull('parque',)->paginate(10);
        // dd($parques);
        // dd($parques);

        return view('admin.admin', ['parques' => $parques, 'section' => 'parques', 'section_cute' => 'Parques']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Parquee:
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (!$request->isMethod('post')) {
            return dd('error');
        }

        $validate = Validator::make(
            $request->all(),
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
            $input = $request->except(['id', '_token', '_method']);
            return back()->withErrors($validate->errors())->withInput($input)->with(['response' => false, 'modal' => 'crear']);
        }
        $parque = new Parque();
        $parque->create($request->except('_token'));

        return back()->with('response',  'creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $parque = Parque::where('id', $id)->firstOrFail();

        if (!count(array($parque)) === 0) {
            return response()->json(['response' => false]);
        }


        return response()->json($parque);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = Validator::make(
            $request->all(),
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
            return back()->withErrors($validate->errors())->withInput($input)->with(['response' => false, 'modal' => 'update'])->with('id', $id);
        }


        //RESPONSE 1 || 0
        $response = Parque::where('id', $id)->update($request->except('_token', '_method', 'id'));
        return back()->with('response',   $response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
