<?php

namespace Tests\Feature;

use App\Models\Students;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class StudentiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
     #[Test]
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    #[Test] 
    public function nije_dozvoljeno_kreiranje_studenta_bez_atributa(){
        $student=Students::create([
            'ime'=>'Josip',
            'prezime'=>'Bošnjak',
            'status'=>'redovni',
            'godiste'=>1992,
            'prosjek'=>5.55,
        ]);
        $this->assertNotEmpty($student->ime);
        $this->assertNotEmpty($student->prezime);
        $this->assertNotEmpty($student->status);
        $this->assertNotEmpty($student->godiste);
        $this->assertNotEmpty($student->prosjek);
    }
     #[Test] 
    public function status_moze_biti_samo_redovni_izvanredni(){
            $student=Students::create([
            'ime'=>'Josip',
            'prezime'=>'Bošnjak',
            'status'=>'izvanredni',
            'godiste'=>1992,
            'prosjek'=>5.55,
        ]);
         $this->assertNotEmpty($student->status);
         $ocekivanaVrijednost="";

         if($student->status==="redovni" || $student->status==="izvanredni"){
            $ocekivanaVrijednost="redovni";
            $this->assertEquals($ocekivanaVrijednost,"redovni");
            $ocekivanaVrijednost="izvanredni";
            $this->assertEquals($ocekivanaVrijednost,"izvanredni");
         }else{
            $ocekivanaVrijednost="";
            $this->assertEquals($ocekivanaVrijednost,"redovni");
            $this->assertEquals($ocekivanaVrijednost,"izvanredni");
         }
    }}
