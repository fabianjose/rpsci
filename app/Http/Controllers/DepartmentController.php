<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller{

	public function getAll(){
		$departments = DB::table('departments')->get();
		if (!$departments) return response()->json('Error en la base de datos',500);
		return response()->json($departments, 200);
	}

}
