<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TanimBeden;

class CreateTanimBeden extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanim_beden', function (Blueprint $table) {
            $table->id();
            $table->string(TanimBeden::COLUMN_BODY,30)->required()->unique()->comment('Beden');
            $table->string(TanimBeden::COLUMN_BUST,30)->required()->unique()->comment('Göğüs');
            $table->string(TanimBeden::COLUMN_WAIST,30)->required()->unique()->comment('Bel');
            $table->string(TanimBeden::COLUMN_HIP,30)->required()->unique()->comment('Kalça');
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
        Schema::dropIfExists('tanim_beden');
    }
}
