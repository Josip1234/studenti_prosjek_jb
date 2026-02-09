<?php

namespace Database\Seeders;

use App\Models\Students;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Students::updateOrCreate([
            "ime"=>"Josip",
            "prezime"=>"Bošnjak",
            "status"=>"izvanredni",
            "godiste"=>1992,
            "prosjek"=>3.5,
        ]);
         Students::updateOrCreate([
            "ime"=>"Ana",
            "prezime"=>"Anić",
            "status"=>"redovni",
            "godiste"=>1998,
            "prosjek"=>2.85,
        ]);
           Students::updateOrCreate([
            "ime"=>"Tester",
            "prezime"=>"Testerović",
            "status"=>"izvanredni",
            "godiste"=>1985,
            "prosjek"=>4.33,
        ]);
    }
}
