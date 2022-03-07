<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TanimYakaTipi;

class CreateTanimYakaTipi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanim_yaka_tipi', function (Blueprint $table) {
            $table->id();
            $table->string(TanimYakaTipi::COLUMN_TITLE)->required()->comment('Yaka Tipi')->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanim_yaka_tipi');
    }
}
