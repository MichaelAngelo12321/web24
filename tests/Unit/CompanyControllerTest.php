<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateCompanyWithEmployees()
    {
        // Przygotowanie danych JSON
        $jsonData = [
            'name' => 'Test Company',
            'nip' => '1234567890',
            'adress' => '123 Main Street',
            'city' => 'Sample City',
            'post_code' => '12345',
            'employees' => [
                [
                    'firstName' => 'FirstName Employee 1',
                    'surName' => 'SurName Employee 1',
                    'email' => 'employee1@example.com',
                    'phone_number' => '11111111111',
                ],
                [
                    'firstName' => 'FirstName Employee 2',
                    'surName' => 'SurName Employee 2',
                    'email' => 'employee2@example.com',
                    'phone_number' => '11111111111',
                ],
            ],
        ];

        // Wywołanie akcji na kontrolerze do utworzenia firmy
        $response = $this->postJson('/api/company', $jsonData);

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

        // Sprawdzenie, czy odpowiedź zawiera tekst "Company Added"
        $response->assertSeeText("Company Added");
    }

    public function testCreateCompanyWithoutEmployees()
    {
        // Przygotowanie danych JSON
        $jsonData = [
            'name' => 'Test Company2',
            'nip' => '1234567891',
            'adress' => '123 Main Street',
            'city' => 'Sample City',
            'post_code' => '12345',
        ];

        // Wywołanie akcji na kontrolerze do utworzenia firmy bez pracowników
        $response = $this->postJson('/api/company', $jsonData);

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

        // Sprawdzenie, czy odpowiedź zawiera tekst "Company Added"
        $response->assertSeeText("Company Added");
    }

    public function testGetCompany()
    {
        // Tworzenie testowej firmy w bazie danych
        $company = Company::factory()->create();

        // Wywołanie akcji na kontrolerze do pobrania danych firmy
        $response = $this->get("/api/company/{$company->id}");

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

    }

    public function testUpdateCompany()
    {
        // Tworzenie testowej firmy w bazie danych
        $company = Company::factory()->create();

        // Przygotowanie danych JSON do aktualizacji firmy
        $jsonData = [
            'name' => 'Updated Company',
            'nip' => '1234567892',
            'adress' => '456 Main Street',
            'city' => 'Updated City',
            'post_code' => '54321',
        ];

        // Wywołanie akcji na kontrolerze do aktualizacji firmy
        $response = $this->putJson("/api/company/{$company->id}", $jsonData);

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

        // Sprawdzenie, czy odpowiedź zawiera tekst "Company Updated"
        $response->assertSeeText("Company Updated");
    }

    public function testDeleteCompany()
    {
        // Tworzenie testowej firmy w bazie danych
        $company = Company::factory()->create();

        // Wywołanie akcji na kontrolerze do usunięcia firmy
        $response = $this->delete("/api/company/{$company->id}");

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

        // Sprawdzenie, czy odpowiedź zawiera tekst "Company Deleted"
        $response->assertSeeText("Company Deleted");
    }
}





