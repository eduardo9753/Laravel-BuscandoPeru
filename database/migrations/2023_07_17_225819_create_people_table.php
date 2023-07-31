<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->integer('edad');
            $table->date('fecha_suceso');
            $table->text('lugar_suceso');
            $table->string('imagen');
            $table->text('adicional')->nullable();

            $table->foreignId('country_id')
                ->nullable()
                ->constrained('id')
                ->on('countries')
                ->nullOnDelete('true'); //cada vez que se elimine un pais su valor sera nulo

            $table->foreignId('state_id')
                ->nullable()
                ->constrained('id')
                ->on('states')
                ->nullOnDelete('true');

            $table->foreignId('user_id')
                ->constrained('id')
                ->on('users')
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
        Schema::dropIfExists('people');
    }
}
