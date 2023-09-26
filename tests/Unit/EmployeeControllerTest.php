<?php

namespace Tests\Unit;

use App\Models\Company;
use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCreateEmployee()
    {
        // Tworzenie testowej firmy w bazie danych
        $company = Company::factory()->create();

        // Przygotowanie danych JSON dla pracownika
        $jsonData = [
            'firstName' => 'Test Employee',
            'surName' => 'Test surName',
            'email' => 'aaa@gmail.com',
            'phone_number' => '11',
            'company_id' => $company->id, // Używamy ID utworzonej firmy
        ];

        // Wywołanie akcji na kontrolerze
        $response = $this->postJson('/api/employee', $jsonData);

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

        // Sprawdzenie, czy odpowiedź zawiera tekst "Employee added"
        $response->assertSeeText("Employee added");
    }

    public function testUpdateEmployee()
    {
        // Tworzenie testowej firmy i pracownika w bazie danych
        $company = Company::factory()->create();
        $employee = Employee::factory()->create(['company_id' => $company->id]);

        // Przygotowanie danych JSON do aktualizacji pracownika
        $jsonData = [
            'firstName' => 'Updated Employee',
            'surName' => 'Updated surName',
            'email' => 'updated@gmail.com',
            'phone_number' => '22',
            'company_id' => $company->id,
        ];

        // Wywołanie akcji na kontrolerze
        $response = $this->putJson("/api/employee/{$employee->id}", $jsonData);

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

        // Sprawdzenie, czy odpowiedź zawiera tekst "Employee updated"
        $response->assertSeeText("Employee updated");
    }

    public function testDeleteEmployee()
    {
        // Tworzenie testowej firmy i pracownika w bazie danych
        $company = Company::factory()->create();
        $employee = Employee::factory()->create(['company_id' => $company->id]);

        // Wywołanie akcji na kontrolerze do usunięcia pracownika
        $response = $this->delete("/api/employee/{$employee->id}");

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

        // Sprawdzenie, czy odpowiedź zawiera tekst "Employee deleted"
        $response->assertSeeText("Employee deleted");
    }

    public function testGetEmployee()
    {
        // Tworzenie testowej firmy i pracownika w bazie danych
        $company = Company::factory()->create();
        $employee = Employee::factory()->create(['company_id' => $company->id]);

        // Wywołanie akcji na kontrolerze do pobrania danych pracownika
        $response = $this->get("/api/employee/{$employee->id}");

        // Sprawdzenie, czy odpowiedź ma status HTTP 200
        $response->assertStatus(200);

    }
}
