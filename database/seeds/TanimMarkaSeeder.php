<?php

use Illuminate\Database\Seeder;

class TanimMarkaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marka = [
            ['title'         =>'Akay Bridal'],
            ['title'         =>'Dreamon'],
            ['title'         =>'Vakko Wedding'],
            ['title'         =>'Miss Defne'],
            ['title'         =>'Mediha Cambaz'],
            ['title'         =>'Aysira Gelinlik'],
            ['title'         =>'Oleg Cassini'],
            ['title'         =>'Banu Güven'],
            ['title'         =>'Alisse Nuera'],
            ['title'         =>'Pronovias'],
            ['title'         =>'Çağteks Bridal'],
        ];
        
        foreach ($marka as $m){
            \App\Models\TanimMarka::create($m);
        }  
    }
}
