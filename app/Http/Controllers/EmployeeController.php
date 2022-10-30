<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;
use Exception;
use Illuminate\Support\Facades\DB;
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

        $this->authorize('create', Employee::class);

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
        $this->authorize('update', Employee::class);

        return view('edit-employee', ['employee' => $employee, 'companies' => DB::table('companies')->get()]);
    }

   
    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $this->authorize('update', Employee::class);

        $inputs = $request->except(['_token', '_method']);
        
        $employee->fill(collect($inputs)->toArray());

        $employee->save();

        return redirect('/employee');
    }

    
    public function destroy($id)
    {
        $this->authorize('delete', Employee::class);

        Employee::where('id', $id)->delete();
        
        return redirect('/employee');
    }
}
