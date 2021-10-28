<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->string('umur', 26);
            $table->date('tanggalkunjungan');
            $table->string('keluhanutama', 255)->nullable();
            $table->string('tinggibadan', 5)->nullable();
            $table->string('beratbadan', 5)->nullable();
            $table->string('lingkarperut', 5)->nullable();
            $table->string('tekanandarah', 7)->nullable();
            $table->string('pernafasan', 3)->nullable();
            $table->string('detakjantung', 3)->nullable();
            $table->string('suhu', 4)->nullable();
            $table->string('pemeriksaanawal', 500)->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('selesai')->nullable();
            $table->string('rujukinternal', 255)->nullable();
            $table->timestamps();
            $table->unique('member_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
