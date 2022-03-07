<?php

use Illuminate\Database\Seeder;

class TanimKiralamaTuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                //Gelinlik Türü
                $gelinlikturu = [
                    ['title'         => 'Gelinlik'],
                    ['title'         => 'Kınalık'],
                    ['title'         => 'Nişanlık'],
                    ['title'         => 'Kaftan&Bindallı'],
                    ['title'         => 'Duvak'],
                    ['title'         => 'Tesettür Gelinlik'],
                    ['title'         => 'Tesettür Kınalık'],
                    ['title'         => 'Tesettür Nişanlık'],
                    ];
                    foreach ($gelinlikturu as $gturu){
                        \App\Models\TanimKiralamaTuru::create($gturu);
                    }
    }
}
