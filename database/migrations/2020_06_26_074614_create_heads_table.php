<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heads', function (Blueprint $table) {
            $table->id();
            $table->string('kartukeluarga', 16);
            $table->string('kepalakeluarga', 50);
            $table->string('alamat', 100);
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->integer('village_id');
            $table->integer('norm');
            $table->timestamps();
            $table->unique('kartukeluarga');
            $table->unique('norm');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('heads');
    }
}
