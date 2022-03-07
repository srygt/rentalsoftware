<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TanimVucutTipi;

class CreateTanimVucutTipi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanim_vucut_tipi', function (Blueprint $table) {
            $table->id();
            $table->string(TanimVucutTipi::COLUMN_TITLE)->required()->comment('Vücut Tipi')->unique();
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
        Schema::dropIfExists('tanim_vucut_tipi');
    }
}
