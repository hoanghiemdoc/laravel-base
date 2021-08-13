<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//truyen mot file tu lop view vao
class HomeController extends Controller
{
    public function index(){
//  trả về file html css từ lớp hello.blade.php
        return view('project');
    }
}
