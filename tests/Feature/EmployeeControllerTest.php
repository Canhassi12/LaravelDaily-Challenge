<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
        /**
     *
     * @test
     */
    // public function store_employee_in_database()
    // {
    //     $employee = Employee::factory()->make();

    //     $company = Company::factory()->make();

    //     $this->post('/company', [
    //         'name'     => $company->name,
    //         'email'    => $company->email,
    //         'logotipo' => $company->logotipo,
    //     ]);
        
    //     $this->post('/employee', [
    //         'id'         => $employee->id,
    //         'first_name' => $employee->first_name,
    //         'last_name'  => $employee->last_name,
    //         'email'      => $employee->email,
    //         'number'     => $employee->number,
    //         'company_id' => '2',
    //     ])
    //     ->assertValid()
    //     ->assertStatus(302);
    // }

    /**
     *
     * @test
     */
    public function index_method_return_view_employee() {
        $this->get('/employee')
        ->assertSuccessful()
        ->assertViewIs('employee');
    }
}
