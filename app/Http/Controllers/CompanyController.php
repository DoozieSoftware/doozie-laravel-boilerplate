<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
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
