<?php

namespace App\Http\Controllers\BackendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Merchant;

class AdminController extends Controller
{
    public function index()
    {
        $merchants = Merchant::all();
        return view('backend.admin.home',compatct('merchants'));
    }
}
