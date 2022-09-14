<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Models\Company;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    
    public function index()
    {
        return view('company');
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

            return response()->view('dashboard', compact('messages'), Response::HTTP_FORBIDDEN);
        }

        $inputs = $request->all();

        $company = [
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'logotipo' => $inputs['logo'],
        ];
        
        try {
            $company = Company::create($company);
    
            return response()->view('dashboard', ['response' => 'The company has been added with sucessful'], Response::HTTP_OK);
        } catch (Exception $error) {
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
    public function show($id)
    {
        //
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
