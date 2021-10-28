<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicalrecords', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->date('tanggalkunjungan');
            $table->integer('umurtahun');
            $table->integer('umurbulan');
            $table->integer('umurhari');
            $table->string('keluhanutama', 255)->nullable();
            $table->string('tinggibadan', 5)->nullable();
            $table->string('beratbadan', 5)->nullable();
            $table->string('lingkarperut', 5)->nullable();
            $table->string('gcs', 25)->nullable();
            $table->string('tekanandarah', 7)->nullable();
            $table->string('pernafasan', 3)->nullable();
            $table->string('detakjantung', 3)->nullable();
            $table->string('suhu', 4)->nullable();
            $table->string('pemeriksaanawal', 500)->nullable();
            $table->string('tinggifundus', 20)->nullable();
            $table->string('bentukuteri', 10)->nullable();
            $table->string('letakjanin', 10)->nullable();
            $table->string('gerakjanin', 15)->nullable();
            $table->string('detakjantungjanin', 4)->nullable();
            $table->string('pemeriksaanlanjutan', 500)->nullable();
            $table->integer('diag_id')->nullable();
            $table->string('tindakan', 500)->nullable();
            $table->string('pengobatan', 500)->nullable();
            $table->string('keterangan', 500)->nullable();
            $table->integer('room_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('medicalrecords');
    }
}
