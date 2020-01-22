<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller{

  public function newCompany(Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['required', 'string', 'min:8', 'max:128', 'unique:companies'],
      'logo' => ['required', 'image'],
      'nit' => ['required', 'string', 'max:16'],
      'phone' => ['required', 'string', 'max:16'],
      'web' => ['required', 'string', 'min:8','max:128'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    if ($data['logo']){
      $filename = uniqid(time()).'.'.$data['logo']->getClientOriginalExtension();
      $uploadedFile = $data['logo'];
      $result = Storage::disk('local')->putFileAs(
        'uploads/logos',
        $uploadedFile,
        $filename
      );
      $data['logo'] = $result;
    }

    $company = Company::create($data);
    if (!$company) return response()->json('Database Error', 500);
    return response()->json('Company successfully created', 201);
  }

  public function editCompany($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['string', 'min:8', 'max:128'],
      'logo' => ['image'],
      'nit' => ['string', 'max:16'],
      'phone' => ['string', 'max:16'],
      'web' => ['string', 'min:8','max:128'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $company = Company::find($id);
    if (!$company) return response()->json('Company not found',404);

    $keysAllow = [
      'name',
      'nit',
      'phone',
      'web'
    ];

    foreach ($keysAllow as $key){
      if (isset($data[$key])){
        $company->{$key} = $data[$key];
      }
    }
    if (isset($data['logo'])){
      $filename = uniqid(time()).'.'.$data['logo']->getClientOriginalExtension();
      $uploadedFile = $data['logo'];
      $result = Storage::disk('local')->putFileAs(
        'uploads/logos',
        $uploadedFile,
        $filename
      );
      $company->logo = $result;
    }
    if (!$company->save()){
      return response()->json('Database Error', 500);
    }

    return response()->json('Company successfully edited', 200);
  }

	public function getAll(){
		$companies = DB::table('companies')->where('trash',0)->get();
		if (!$companies) return response()->json('Database Error',500);
		return response()->json($companies, 200);
	}

  public function getNames(){
		$companies = DB::table('companies')->where('trash',0)->get();
		if (!$companies) return response()->json('Database Error',500);
    $names = array();
    foreach ($companies as $key) {
      array_push($names,$key->name);
    }
		return response()->json($names, 200);
	}

	public function getCompany($id){
		$company = Company::find($id);
		if (!$company) return response()->json('Company not found',404);
		$company = DB::table('companies')->where('id',$id)->where('trash',0)->first();
		if (!$company) return response()->json('Company not found',404);
		return response()->json($company, 200);
	}

	public function deleteCompany($id){
		$company = Company::find($id);
		if (!$company) return response()->json('Company not found',404);
		$company->trash = 1;
		if (!$company->save()) return response()->json('Database Error',500);
		return response()->json('Company successfully deleted', 200);
	}

}
