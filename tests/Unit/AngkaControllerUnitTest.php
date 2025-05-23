<?php

namespace Tests\Unit;

use App\Http\Controllers\AngkaController;
use Illuminate\Http\Request;
use Tests\TestCase;

class AngkaControllerUnitTest extends TestCase
{
    protected $controller;

    protected function setUp(): void
    {
        parent::setUp();
        $this->controller = new AngkaController();
    }

    /**
     * Test angka ganjil menghasilkan output Ganjil.
     */
    public function test_odd_number_returns_ganjil()
    {
        $request = new Request(['angka' => 1]);
        $response = $this->controller->cekAngka($request);

        $this->assertEquals('Ganjil', session('hasil'));
    }

    /**
     * Test angka genap menghasilkan output Genap.
     */
    public function test_even_number_returns_genap()
    {
        $request = new Request(['angka' => 2]);
        $response = $this->controller->cekAngka($request);

        $this->assertEquals('Genap', session('hasil'));
    }

    /**
     * Test angka nol menghasilkan output Genap.
     */
    public function test_zero_returns_genap()
    {
        $request = new Request(['angka' => 0]);
        $response = $this->controller->cekAngka($request);

        $this->assertEquals('Genap', session('hasil'));
    }
}