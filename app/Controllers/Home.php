<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('layer/shared/head')
        .view('layer/shared/footer');
    }
}
