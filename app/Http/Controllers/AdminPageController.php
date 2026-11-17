<?php

namespace App\Http\Controllers;

class AdminPageController extends Controller
{
    public function diskon()
    {
        return view('admin.diskon.index');
    }

    public function delivery()
    {
        return view('admin.delivery.index');
    }

    public function takein()
    {
        return view('admin.takein.index');
    }
}
