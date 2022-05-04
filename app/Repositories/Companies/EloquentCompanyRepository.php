<?php

namespace App\Repositories\Companies;

use App\Models\Company;
use App\Repositories\Companies\CompanyContract;

// use DB;

class EloquentCompanyRepository implements CompanyContract
{

	public function create($request){
		$company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return $company;

	}

    public function edit($id, $request){
    	$company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->address = $request->address;
        $company->save();
        return $company;
    }

    public function findAll(){
    	$data['companies'] = Company::orderBy('id','desc')->paginate(5);
    	return $data;

    }

    public function remove($companyID){
    		return Company::where('id', $companyID)->delete();
    }

    public function findById($id){
    	return Company::where('id', $id)->first();
    }


}