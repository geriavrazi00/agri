<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {

    	$this->middleware(function($request, $next) {
    		if(session('success_message')) {
    			toast(session('success_message'),'success','top-right');
            	/*Alert::success('Sukses', session('success_message'))
                	->showConfirmButton('Ok', '#2ab27b');*/
        	}

            if(session('error_message')) {
            	toast(session('error_message'),'error','top-right');
                /*Alert::error(trans('Error'), session('error_message'))
                    ->showConfirmButton('Ok', '#bf5329');*/
            }

        	return $next($request);
    	});
    }
}
