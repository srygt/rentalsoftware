<?php

use Illuminate\Database\Seeder;

class TanimVucutTipiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vucuttipi = [
            ['title'         =>'Dikdörtgen Vücut Tipi'],
            ['title'         =>'Elma Vücut Tipi'],
            ['title'         =>'Armut Vücut Tipi'],
            ['title'         =>'Kum Saati Vücut Tipi'],
            ['title'         =>'Ters Üçgen Vücut Tipi'],
        ];

        foreach ($vucuttipi as $vt){
            \App\Models\TanimVucutTipi::create($vt);
        }
    }
}
