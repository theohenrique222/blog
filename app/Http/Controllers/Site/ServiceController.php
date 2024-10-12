<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function show() {
        return view('site.services');
    }

    public function create() {
        return view('site.create-services');
    }
}
