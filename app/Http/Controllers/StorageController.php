<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{

	private function exists($path){
		return Storage::disk('local')->exists($path);
	}


    function img($requested){
    	
    	$checkPath = 'img/'  . $requested;
    	$path = storage_path('app/img/'  . $requested);

    	if(!$this->exists($checkPath))
    		abort(404);

    	return response()->download($path);
    }
}
