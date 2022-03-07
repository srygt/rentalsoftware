<?php

use Illuminate\Database\Seeder;

class TanimKolTipiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $koltipi = [
            ['title'         =>'Askılı'],
            ['title'         =>'Kolsuz'],
            ['title'         =>'Kısa kol'],
            ['title'         =>'Truvakar kol'],
            ['title'         =>'Uzun kol'],
            ['title'         =>'Balon kol'],
            ['title'         =>'Kap kol'],
        ];
        
        foreach ($koltipi as $s){
            \App\Models\TanimKolTipi::create($s);
        }  
    }
}
