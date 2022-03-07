<?php

use Illuminate\Database\Seeder;

class TanimRenkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $renk = [
            ['title'         =>'Düz Beyaz Gelinlik'],
            ['title'         =>'Kırık Beyaz Gelinlik'],
            ['title'         =>'Krem Gelinlik'],
            ['title'         =>'Şampanya Rengi Gelinlik'],
            ['title'         =>'Açık Pembe Gelinlik'],
            ['title'         =>'Parlak Altın Rengi Gelinlik'],
        ];
        
        foreach ($renk as $r){
            \App\Models\TanimRenk::create($r);
        }   
    }
}
