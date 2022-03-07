<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TanimKiralamaTuru;

class CreateTanimKiralamaTuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanim_kiralama_turu', function (Blueprint $table) {
            $table->id();
            $table->string(TanimKiralamaTuru::COLUMN_TITLE,255)->required()->comment('Kiralama Türü Giriniz')->unique();
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
        Schema::dropIfExists('tanim_kiralama_turu');
    }
}
