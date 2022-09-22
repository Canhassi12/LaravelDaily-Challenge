<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    public function index()
    { 
        return view('employee', [
            'employees' => DB::table('employees')->paginate(10),
            'companies' => DB::table('companies')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string',
            'number' => 'required|string',
            'company' => 'required|string',
        ]);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag()->first();

            return response()->view('employee', compact('messages'), Response::HTTP_FORBIDDEN);
        }

        $inputs = $request->all();


        $employee = [
            'first_name' => $inputs['firstname'],
            'last_name' => $inputs['lastname'],
            'email' => $inputs['email'],
            'number' => $inputs['number'],
            'company_id' => (int)$inputs['company'],
        ];
        
        try {
            $employee = Employee::create($employee);
            return redirect('/employee');        
        } catch (Exception $error) {
            dd($error);
            return response()->view('employee', ['error' => 'invalid or existing company'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function edit(Employee $employee)
    {
        return view('edit-employee', ['employee' => $employee, 'companies' => DB::table('companies')->get()]);
    }

   
    public function update(Request $request, Employee $employee)
    {
        $inputs = $request->except(['_token', '_method']);
        
        $employee->fill(collect($inputs)->toArray());

        $employee->save();

        return redirect('/employee');
    }

    
    public function destroy($id)
    {
        //
    }
}
