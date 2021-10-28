<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('head_id');
            $table->string('nama', 50);
            $table->string('nik', 16)->nullable();
            $table->string('jeniskelamin', 10);
            $table->string('tempatlahir', 30)->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('pendidikan', 30)->nullable();
            $table->string('pekerjaan', 30)->nullable();
            $table->string('golongandarah', 10)->nullable();
            $table->string('perkawinan', 20)->nullable();
            $table->string('hubungankeluarga', 20);
            $table->string('jaminankesehatan', 20)->nullable();
            $table->string('nomorjaminankesehatan', 20)->nullable();
            $table->string('nomortelepon')->nullable();
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
        Schema::dropIfExists('members');
    }
}
