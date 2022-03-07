<?php

use Illuminate\Database\Seeder;

class TanimMateryalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $renk = [
            ['title'         =>'Tül'],
            ['title'         =>'Saten'],
            ['title'         =>'Şifon'],
            ['title'         =>'Organize'],
            ['title'         =>'Dantel'],
            ['title'         =>'Kasnak İşi Dantel'],
            ['title'         =>'Drapeli'],
        ];
        
        foreach ($renk as $r){
            \App\Models\TanimMateryal::create($r);
        }  
    }
}
