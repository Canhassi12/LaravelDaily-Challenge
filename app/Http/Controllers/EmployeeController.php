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
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|string',
            'number' => 'required|string',
            'company_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            $messages = $validator->getMessageBag()->first();

            return response()->view('employee', ['messages' => $messages, 'companies' =>  DB::table('companies')->get()], Response::HTTP_FORBIDDEN);
        }

        $inputs = $request->all();


        $employee = [
            'first_name' => $inputs['first_name'],
            'last_name' => $inputs['last_name'],
            'email' => $inputs['email'],
            'number' => $inputs['number'],
            'company_id' => (int)$inputs['company_id'],
        ];
        
        try {
            $employee = Employee::create($employee);
            return redirect('/employee');        
        } catch (Exception $error) {
            return response()->view('employee', ['error' => 'invalid or existing company', 'companies' =>  DB::table('companies')->get()], Response::HTTP_INTERNAL_SERVER_ERROR);
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
        Employee::where('id', $id)->delete();
        
        return redirect('/employee');
    }
}
