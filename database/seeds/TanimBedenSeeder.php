<?php

use Illuminate\Database\Seeder;

class TanimBedenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Bedenler
        $beden = [
            ['body' => '42','bust' => '95-99','waist' =>'79-83','hip' =>'103-107'],
            ['body' => '44','bust' => '100-104','waist' =>'84-88','hip' =>'108-112'],
            ['body' => '46','bust' => '105-109','waist' =>'89-93','hip' =>'113-117'],
            ['body' => '48','bust' => '110-115','waist' =>'94-99','hip' =>'118-122'],
            ['body' => '50','bust' => '116-121','waist' =>'100-105','hip' =>'123-127'],
            ['body' => '52','bust' => '122-127','waist' =>'106-111','hip' =>'128-132'],
            ['body' => '54','bust' => '128-133','waist' =>'112-117','hip' =>'133-138'],
            ['body' => '56','bust' => '134-139','waist' =>'118-123','hip' =>'139-144'],
            ['body' => '58','bust' => '140-145','waist' =>'124-129','hip' =>'145-150'],
            ['body' => '60','bust' => '146-151','waist' =>'130-135','hip' =>'151-156'],
            ['body' => '62','bust' => '152-157','waist' =>'136-141','hip' =>'157-162'],

        ];

        foreach($beden as $bed){
            \App\Models\TanimBeden::create($bed);

        }
    }
}
