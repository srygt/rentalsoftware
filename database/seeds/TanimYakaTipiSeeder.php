<?php

use Illuminate\Database\Seeder;

class TanimYakaTipiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Yaka Tipi
        $yakatipi = [
            ['title'=>'Straplez Düz Gelinlikler'],
            ['title'=>'Kalp Yaka Straplez Gelinlikler'],
            ['title'=>'Asimetrik Yaka / Tek Omuzlu Gelinlik Modelleri'],
            ['title'=>'Düşük Omuz Gelinlik Modelleri'],
            ['title'=>'Prenses Yaka Gelinlikler'],
            ['title'=>'Düz Düşük Yaka Gelinlikler'],
            ['title'=>'Kare Yaka Gelinlik Modelleri'],
            ['title'=>'Hakim Yaka Gelinlik Modelleri'],
            ['title'=>'İllüzyon Yaka Gelinlik Modelleri'],
            ['title'=>'V Yaka Gelinlik Modelleri'],
            ['title'=>'U Yaka Gelinlik Modelleri'],
            ['title'=>'Kayık Yaka Gelinlik Modelleri'],
            ['title'=>'Yarım Kayık Yaka Gelinlik Modelleri'],
            ['title'=>'Bisiklet Yaka Gelinlik Modelleri'],
            ['title'=>'Japone Yaka Gelinlik Modelleri'],
            ['title'=>'Halter Yaka Gelinlik Modelleri'],
        ];

        foreach ($yakatipi as $ytipi) {
            \App\Models\TanimYakaTipi::create($ytipi);
        }
    }
}
