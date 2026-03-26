<?php
namespace App\Controllers;

use App\Models\ExampleModel;

class Home extends BaseController
{
    public function index()
    {
        return view('home_view');
    }
}