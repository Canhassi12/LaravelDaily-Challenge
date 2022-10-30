<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    public function index()
    {
        return view('company', ['companies' => DB::table('companies')->paginate(10)]); 
    }
    
    public function store(CompanyStoreRequest $request)
    {
        $this->authorize('create', Company::class);

        $request->logotipo->store('logotipos', 'public');

        try {
            Company::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'logotipo' => $request->logotipo->hashName(),
            ]);
    
            return redirect('/company');
        } catch (Exception $error) {
            return response()->view('company', ['error' => 'invalid or existing company'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit(Company $company)
    {
        $this->authorize('update', Company::class);

        return view('edit-company', compact('company'));
    }

    public function update(CompanyUpdateRequest $request, Company $company)
    {    
        $this->authorize('update', Company::class);

        $request->logotipo->store('logotipos', 'public');

        File::delete(public_path('storage/logotipos/'.$company->logotipo));        
        $company->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'logotipo' => $request->logotipo->hashName(),
        ]);

        return redirect('/company');
    }

    public function destroy($id)
    {
        $this->authorize('delete', Company::class);

        Company::where('id', $id)->delete();
        
        return redirect('/company');
    }
}
