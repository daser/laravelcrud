<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Companies\CompanyContract;


class CoyController extends Controller
{
    //


    protected $repo;


    public function __construct(CompanyContract $companyContract){
        $this->repo = $companyContract;
    }



    public function index()
    {
        $fetchedData = $this->repo->findAll();
        return view('coys.index', $fetchedData);
    }


    public function create()
    {
        return view('coys.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required'
        ]);

        $this->repo->create($request);
        return redirect()->route('coys.index')
        ->with('success','Company has been created successfully.');
    }


    public function edit($companyID)
    {
        $company = $this->repo->findById($companyID);
        // return view('coys.edit',$companyID);
        return view('coys.edit',compact('company'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'address' => 'required',
        ]);
        $company = $this->repo->edit($id, $request);
        // $this->repo->edit($id, $request);
        return redirect()->route('coys.index')
        ->with('success','Company Has Been updated successfully');
    }

    public function destroy($companyID)
    {        
        $company = $this->repo->remove($companyID);
        return redirect()->route('coys.index')
        ->with('success','Company has been deleted successfully');
    }

}
