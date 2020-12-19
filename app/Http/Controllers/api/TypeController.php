<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;

class TypeController extends Controller
{
    public function index() {
        return Type::all();
    }
}
