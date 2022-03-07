<?php

use Illuminate\Database\Seeder;

class TanimEtekKesimiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stil = [
            ['title'         =>'Prenses kesim'],
            ['title'         =>'A kesim'],
            ['title'         =>'Balık kesim'],
            ['title'         =>'Düz kesim'],
            ['title'         =>'Kaburga'],
            ['title'         =>'Robalı'],
        ];
        
        foreach ($stil as $s){
            \App\Models\TanimEtekKesimi::create($s);
        }  
    }
}
