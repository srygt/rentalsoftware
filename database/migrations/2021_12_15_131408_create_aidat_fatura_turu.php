<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AidatFaturaTuru;

class CreateAidatFaturaTuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aidat_fatura_turu', function (Blueprint $table) {
            $table->id();
            $table->string(AidatFaturaTuru::COLUMN_BASLIK,250)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aidat_fatura_turu');
    }
}
