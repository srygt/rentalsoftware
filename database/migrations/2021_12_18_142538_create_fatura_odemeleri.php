<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaturaOdemeleri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fatura_odemeleri', function (Blueprint $table) {
            $table->id();
            $table->string('fatura_no',100)->required();
            $table->string('fatura_detay',255)->required();
            $table->integer('odemedurumu')->required();
            $table->datetime('odemetarihi')->required();
            $table->string('odemenotu')->nullable();
            $table->decimal('odemetutari',12,9)->nullable();
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
        Schema::dropIfExists('fatura_odemeleri');
    }
}
