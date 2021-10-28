<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMomcardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('momcards', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->date('tanggalkunjungan');

            $table->string('kontrasepsiterakhir', 20);

            $table->string('umuranak1', 2)->nullable();
            $table->string('beratanak1', 4)->nullable();
            $table->string('penolongpersalinananak1', 20)->nullable();
            $table->string('carapersalinananak1', 10)->nullable();
            $table->string('keadaanbayianak1', 15)->nullable();
            $table->string('komplikasianak1', 20)->nullable();
            $table->string('umuranak2', 2)->nullable();
            $table->string('beratanak2', 4)->nullable();
            $table->string('penolongpersalinananak2', 20)->nullable();
            $table->string('carapersalinananak2', 10)->nullable();
            $table->string('keadaanbayianak2', 15)->nullable();
            $table->string('komplikasianak2', 20)->nullable();
            $table->string('umuranak3', 2)->nullable();
            $table->string('beratanak3', 4)->nullable();
            $table->string('penolongpersalinananak3', 20)->nullable();
            $table->string('carapersalinananak3', 10)->nullable();
            $table->string('keadaanbayianak3', 15)->nullable();
            $table->string('komplikasianak3', 20)->nullable();

            $table->string('haidterakhir', 20)->nullable();
            $table->string('perkiraanpartus', 20)->nullable();
            $table->string('keluhanutama', 128)->nullable();

            $table->string('nafsumakan', 20)->nullable();
            $table->string('muntah', 30)->nullable();
            $table->string('pusing', 30)->nullable();
            $table->string('nyeriperut', 20)->nullable();
            $table->string('oedema', 20)->nullable();
            $table->string('penyakitdiderita', 20)->nullable();
            $table->string('riwayatkeluarga', 20)->nullable();
            $table->string('kebiasaankehamilan', 20)->nullable();

            $table->string('pucat', 20)->nullable();
            $table->string('kesadaran', 20)->nullable();
            $table->string('bentuktubuh', 20)->nullable();
            $table->string('suhubadan', 20)->nullable();
            $table->string('kuning', 20)->nullable();
            $table->string('lila', 20)->nullable();
            $table->string('tinggibadan', 20)->nullable();
            $table->string('beratbadan', 20)->nullable();
            $table->string('tekanandarah', 20)->nullable();
            $table->string('detakjantung', 20)->nullable();
            $table->string('pernafasan', 20)->nullable();

            $table->string('muka', 20)->nullable();
            $table->string('mulut', 20)->nullable();
            $table->string('gigi', 20)->nullable();
            $table->string('paruparu', 20)->nullable();
            $table->string('jantung', 20)->nullable();
            $table->string('payudara', 20)->nullable();
            $table->string('hati', 20)->nullable();
            $table->string('abdomen', 20)->nullable();
            $table->string('tangantungkai', 20)->nullable();

            $table->string('tinggifundus', 20)->nullable();
            $table->string('bentukfundus', 20)->nullable();
            $table->string('bentukuterus', 20)->nullable();
            $table->string('letakjanin', 20)->nullable();
            $table->string('gerakjanin', 20)->nullable();
            $table->string('detakjantungjanin', 20)->nullable();
            $table->string('inspekulo', 20)->nullable();
            $table->string('perdarahan', 20)->nullable();
            $table->string('pemeriksaandalam', 20)->nullable();
            
            $table->string('haemoglobin', 20)->nullable();
            $table->string('urinealbumine', 20)->nullable();
            $table->string('urinereduksi', 20)->nullable();
            $table->string('faeces', 20)->nullable();
            $table->string('malaria', 20)->nullable();
            $table->string('golongandarah', 20)->nullable();
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
        Schema::dropIfExists('momcards');
    }
}
