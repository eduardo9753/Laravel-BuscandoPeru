<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacteristicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characteristics', function (Blueprint $table) {
            $table->id();
            $table->string('tez', 60); //->nullable('false');
            $table->string('cabello', 60);
            $table->string('ojos', 50);
            $table->string('nariz', 50)->nullable();
            $table->string('boca', 50)->nullable();
            $table->string('contextura', 50)->nullable();
            $table->string('estatura', 10);

            $table->foreignId('person_id')
                ->constrained('id')
                ->on('people')
                ->onDelete('cascade');

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
        Schema::dropIfExists('characteristics');
    }
}
