<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    /**
     *
     * @test
     */
    public function store_company_in_database()
    {
        $company = Company::factory()->make();

        $this->post('/company', [
            'name'     => $company->name,
            'email'    => $company->email,
            'logotipo' => $company->logotipo,
        ])
        ->assertValid()
        ->assertStatus(302);
    }

    /**
     *
     * @test
     */
    public function index_method_return_view_company() {
        $this->get('/company')
        ->assertSuccessful()
        ->assertViewIs('company');
    }

    /**
     *
     * @test
     */
    public function edit_metod_return_view_editCompant() {
        $company = Company::factory()->make();

        $this->post('/company', [
            'name'     => $company->name,
            'email'    => $company->email,
            'logotipo' => $company->logotipo
        ]);

        $this->get("company/$company->id/edit")
        ->assertViewIs('edit-company')
        ->assertSuccessful();
    }
}  
