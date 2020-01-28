<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Department;

class DepartmentController extends Controller{

	public function newDepartment(Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['required', 'string', 'min:4', 'max:64', 'unique:departments'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $department = Department::create($data);
    if (!$department) return response()->json('Error en la base de datos', 500);
    return response()->json('Departamento creado satisfactoriamente', 201);
  }

	public function getAll(){
		$departments = DB::table('departments')->get();
		if (!$departments) return response()->json('Error en la base de datos',500);
		return response()->json($departments, 200);
	}

}
