<?php

namespace App\Http\Controllers;

use App\Models\Inspecciones;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function test($id = '')
    {
        $tecnico = auth()->user()->id;
        return view('tecnico.test', ['section' => 'test', 'section_cute' => 'Test', 'role' => 'tecnico', 'role_cute' => 'Técnico',  'id' => $id]);
    }
}
