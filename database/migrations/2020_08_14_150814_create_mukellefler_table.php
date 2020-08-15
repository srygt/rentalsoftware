<?php

use App\Models\Mukellef;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMukelleflerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mukellefler', function (Blueprint $table) {
            $table->id();
            $table->char(Mukellef::COLUMN_VERGI_NO,10)->nullable();
            $table->char(Mukellef::COLUMN_TC_KIMLIK_NO,11)->nullable();
            $table->string(Mukellef::COLUMN_UNVAN);
            $table->string(Mukellef::COLUMN_VERGI_DAIRESI_SEHIR);
            $table->string(Mukellef::COLUMN_VERGI_DAIRESI);

            // aşağıdaki alanlarda yapılacak değişikliklerin
            // 2020_08_14_150814_create_mukellefler_table'da da yapılması lazım
            $table->string(Mukellef::COLUMN_EMAIL);
            $table->string(Mukellef::COLUMN_WEBSITE)->nullable();
            $table->string(Mukellef::COLUMN_ULKE);
            $table->string(Mukellef::COLUMN_IL);
            $table->string(Mukellef::COLUMN_ILCE);
            $table->string(Mukellef::COLUMN_ADRES);
            $table->string(Mukellef::COLUMN_TELEFON);
            $table->string(Mukellef::COLUMN_URN);

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
        Schema::dropIfExists('mukellefler');
    }
}
