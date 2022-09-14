<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    
    public function index()
    {
        return view('company', ['companies' => DB::table('companies')->paginate(10)]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
            'email' => 'required|string',
            'logo' => 'required',
        ]);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag()->first();

            return response()->view('company', compact('messages'), Response::HTTP_FORBIDDEN);
        }

        $inputs = $request->all();

        $company = [
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'logotipo' => $inputs['logo'],
        ];
        
        try {
            $company = Company::create($company);
    
            return redirect('/company');
        } catch (Exception $error) {
            return response()->view('company', ['error' => 'invalid or existing company'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
    public function show($id)
    {
        
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
