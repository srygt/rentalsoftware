<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TanimEtekKesimi;

class CreateTanimEtekKesimi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanim_etek_kesimi', function (Blueprint $table) {
            $table->id();
            $table->string(TanimEtekKesimi::COLUMN_TITLE)->required()->comment('Marka')->unique();
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanim_etek_kesimi');
    }
}
