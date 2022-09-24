<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
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

    public function store(EmployeeStoreRequest $request)
    {
        $employee = $request->all();

        try {
            $employee = Employee::create($employee);

            return redirect('/employee');        
        } catch (Exception $error) {
            return response()->view('employee', ['error' => 'invalid or existing employee', 'companies' =>  DB::table('companies')->get()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
 
    public function edit(Employee $employee)
    {
        return view('edit-employee', ['employee' => $employee, 'companies' => DB::table('companies')->get()]);
    }

   
    public function update(EmployeeUpdateRequest $request, Employee $employee)
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
