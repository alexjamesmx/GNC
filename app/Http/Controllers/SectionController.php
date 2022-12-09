<?php

namespace App\Http\Controllers;

class SectionController extends Controller
{
    public function admin()
    {
        $role = 'Admin';
        return view('admin.admin', ['section' => 'dashboard', 'section_cute' => 'Dashboard', 'role' => $role]);
    }

    public function tecnico()
    {
        $data = array('id' => "ejemplo", 'name' => "ejemplo2", 'email' => "ejemplo3");
        return view('tecnico.dashboard', ['section' => 'dashboard', 'section_cute' => 'Dashboard', 'role' => 'tecnico', 'role_cute' => 'Técnico', 'data' => $data]);
    }
}
