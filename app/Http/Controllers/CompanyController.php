<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:company-list|company-create|company-edit|company-delete', ['only' => ['index','store']]);
    //      $this->middleware('permission:company-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:company-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:company-delete', ['only' => ['destroy']]);
    // }

    public function index()
    {
        $company = Company::where('id', 1)->first();
        return view('company',compact('company'));
    }

    public function edit($id)
    {
        $company = Company::where('id',$id)->first();
        return view('company_edit',compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::find($id);
        $company->update($request->all());
        if($request->hasFile('logo') && $request->file('logo')->isValid()){
            $company->addMediaFromRequest('logo')->toMediaCollection('logo');
        }

        if($request->hasFile('certificate') && $request->file('certificate')->isValid()){
            $company->addMediaFromRequest('certificate')->toMediaCollection('certificate');
        }

        $company->save();

        return redirect()->route('company');
    }

   
}
