<?php

use Illuminate\Database\Seeder;

class TanimKesimTipiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ktipi = [
            ['title'         =>'A Kesim Gelinlik Modelleri'],
            ['title'         =>'Deniz kızı/Balık Kesim Gelinlik'],
            ['title'         =>'Sade Düz Kesim Gelinlik'],
            ['title'         =>'Kısa Boy Gelinlik'],
            ['title'         =>'Prenses-Balo Kesim Gelinlik'],
            ['title'         =>'Tesettür Gelinlik Modelleri'],
            ['title'         =>'Kapalı Gelinlik Modelleri'],
        ];
        
        foreach ($ktipi as $k){
            \App\Models\TanimKesimTipi::create($k);
        }  
    }
}
