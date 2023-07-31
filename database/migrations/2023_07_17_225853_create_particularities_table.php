<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticularitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('particularities', function (Blueprint $table) {
            $table->id();
            $table->text('vestimenta');
            $table->text('ultima_vista');
            $table->text('observaciones');

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
        Schema::dropIfExists('particularities');
    }
}
