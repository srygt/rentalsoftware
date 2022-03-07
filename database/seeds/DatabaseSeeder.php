<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(MukellefSeeder::class);
//        $this->call(AboneSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call([MenuSeeder::class]);
        $this->call([TanimKiralamaTuruSeeder::class]);
        $this->call([TanimYakaTipiSeeder::class]);
        $this->call([TanimBedenSeeder::class]);
        $this->call([TanimVucutTipiSeeder::class]);
        $this->call([TanimRenkSeeder::class]);
        $this->call([TanimMarkaSeeder::class]);
        $this->call([TanimMateryalSeeder::class]);
        $this->call([TanimKesimTipiSeeder::class]);
        $this->call([TanimStilSeeder::class]);
        $this->call([TanimEtekKesimiSeeder::class]);
        $this->call([TanimKolTipiSeeder::class]);
    }
}
