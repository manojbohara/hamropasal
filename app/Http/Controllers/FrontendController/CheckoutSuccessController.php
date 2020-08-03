<?php

namespace App\Http\Controllers\FrontendController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutSuccessController extends Controller
{
    public function __invoke()
    {
    	return view('frontend.CheckoutSuccessful');
    }
}
