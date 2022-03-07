<?php

use Illuminate\Database\Seeder;

class TanimStilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stil = [
            ['title'         =>'Bohem'],
            ['title'         =>'Klasik'],
            ['title'         =>'Zarif'],
            ['title'         =>'Modern'],
            ['title'         =>'Romantik'],
        ];
        
        foreach ($stil as $s){
            \App\Models\TanimStil::create($s);
        }  
    }
}
