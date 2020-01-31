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
      'name' => ['required', 'string', 'min:3', 'max:128', 'unique:companies'],
      'logo' => ['required', 'image'],
      'nit' => ["nullable", 'string', 'max:16'],
      'phone' => ['required', 'string', 'max:16'],
      'web' => ['required', 'string', 'min:3','max:128'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    if ($data['logo']){
      $filename = uniqid(time()).'.'.$data['logo']->getClientOriginalExtension();
      $uploadedFile = $data['logo'];
      $result = Storage::disk('local')->putFileAs(
        'public/uploads/logos',
        $uploadedFile,
        $filename
      );
      $data['logo'] = 'uploads/logos/'.$filename;
    }

    $company = Company::create($data);
    if (!$company) return response()->json(['errorMessage' =>  'Error en la base de datos'],500);
    return response()->json(201);
  }

  public function editCompany($id, Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'name' => ['string', 'min:3', 'max:128'],
      'logo' => ['image'],
      'nit' => ["nullable", 'string', 'max:16'],
      'phone' => ['string', 'max:16'],
      'web' => ['string', 'min:3','max:128'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }
    $company = Company::find($id);
    if (!$company) return response()->json(['errorMessage' => 'Empresa no encontrada'],404);

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
        'public/uploads/logos',
        $uploadedFile,
        $filename
      );
      $result = 'uploads/logos/'.$filename;

      $company->logo = $result;
    }
    if (!$company->save()){
      return response()->json(['errorMessage' =>  'Error en la base de datos'],500);
    }

    return response()->json(200);
  }

	public function getAll(){
		$companies = DB::table('companies')->where('trash',0)->get();
		if (!$companies) return response()->json(['errorMessage' =>  'Error en la base de datos'],500);
		return response()->json($companies, 200);
	}

	public function getCompany($id){
		$company = Company::find($id);
		if (!$company) return response()->json(['errorMessage' => 'Empresa no encontrada'],404);
		$company = DB::table('companies')->where('id',$id)->where('trash',0)->first();
		if (!$company) return response()->json(['errorMessage' => 'Empresa no encontrada'],404);
		return response()->json($company, 200);
	}

	public function deleteCompany($id){
		$company = Company::find($id);
		if (!$company) return response()->json(['errorMessage' => 'Empresa no encontrada'],404);
		$company->trash = 1;
		if (!$company->save()) return response()->json(['errorMessage' =>  'Error en la base de datos'],500);
		return response()->json(200);
	}

  public function highlightCompany($name,Request $request){
    $data = $request->all();
    $validation = Validator::make($data, [
      'highlighted_expiration' => ['required', 'date'],
    ]);
    if ($validation->fails()){
      return response()->json($validation->errors(), 400);
    }

    $company = Company::where('name',$name)->first();
    if (!$company) return response()->json(['errorMessage' => 'Empresa no encontrada'],404);

    if ($company->highlighted){
      return response()->json(['errorMessage' => 'Empresa ya destacada'], 400);
    }

    $company->highlighted = 1;
    $company->highlighted_expiration = $data['highlighted_expiration'];
		if (!$company->save()) return response()->json(['errorMessage' =>  'Error en la base de datos'],500);

		return response()->json(200);
  }

  public function deHighlightCompany($id){
    $company = Company::find($id);
		if (!$company) return response()->json(['errorMessage' => 'Empresa no encontrada'],404);

    $company->highlighted = 0;
    $company->highlighted_expiration = null;
		if (!$company->save()) return response()->json(['errorMessage' =>  'Error en la base de datos'],500);

		return response()->json(200);
  }

  public function getAllHighlighted(){
		$companies = DB::table('companies')
    ->where('trash',0)
    ->where('highlighted',1)
    ->where('highlighted_expiration','>',date('Y-m-d h:i:s'))
    ->get();
		if (!$companies) return response()->json(['errorMessage' =>  'Error en la base de datos'],500);
		return response()->json($companies, 200);
	}

}
