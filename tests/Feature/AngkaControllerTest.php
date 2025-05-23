<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AngkaControllerTest extends TestCase
{
    /**
     * Test form cek angka ditampilkan dengan benar.
     */
    public function test_show_form_ceking_number()
    {
        $response = $this->get('/cek-angka');

        $response->assertStatus(200);
        $response->assertViewIs('cek_angka');
    }

    /**
     * Test input angka ganjil menghasilkan output Ganjil.
     */
    public function test_odd_number_returns_ganjil()
    {
        $response = $this->post('/cek-angka', ['angka' => 1]);

        $response->assertStatus(302); // Redirect back
        $response->assertSessionHas('hasil', 'Ganjil');
    }

    /**
     * Test input angka genap menghasilkan output Genap.
     */
    public function test_even_number_returns_genap()
    {
        $response = $this->post('/cek-angka', ['angka' => 2]);

        $response->assertStatus(302); // Redirect back
        $response->assertSessionHas('hasil', 'Genap');
    }

    /**
     * Test input bukan angka menghasilkan error validasi.
     */
    public function test_invalid_input_returns_validation_error()
    {
        $response = $this->post('/cek-angka', ['angka' => 'abc']);

        $response->assertStatus(302); // Redirect back
        $response->assertSessionHasErrors('angka');
    }
}