<?php

use App\Mymodels\odontogram;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOdontogramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('odontograms', function (Blueprint $table) {
            $table->id();
            $table->integer('member_id');
            $table->date('tanggalkunjungan');
            $table->string('gigi11', 10);
            $table->string('gigi12', 10);
            $table->string('gigi13', 10);
            $table->string('gigi14', 10);
            $table->string('gigi15', 10);
            $table->string('gigi16', 10);
            $table->string('gigi17', 10);
            $table->string('gigi18', 10);
            $table->string('gigi21', 10);
            $table->string('gigi22', 10);
            $table->string('gigi23', 10);
            $table->string('gigi24', 10);
            $table->string('gigi25', 10);
            $table->string('gigi26', 10);
            $table->string('gigi27', 10);
            $table->string('gigi28', 10);
            $table->string('gigi31', 10);
            $table->string('gigi32', 10);
            $table->string('gigi33', 10);
            $table->string('gigi34', 10);
            $table->string('gigi35', 10);
            $table->string('gigi36', 10);
            $table->string('gigi37', 10);
            $table->string('gigi38', 10);
            $table->string('gigi41', 10);
            $table->string('gigi42', 10);
            $table->string('gigi43', 10);
            $table->string('gigi44', 10);
            $table->string('gigi45', 10);
            $table->string('gigi46', 10);
            $table->string('gigi47', 10);
            $table->string('gigi48', 10);
            $table->string('periodontal', 20);
            $table->string('karanggigi', 20);
            $table->string('sikatgigi', 20);
            $table->integer('debris16');
            $table->integer('debris11');
            $table->integer('debris26');
            $table->integer('debris46');
            $table->integer('debris31');
            $table->integer('debris36');
            $table->integer('kalkulus16');
            $table->integer('kalkulus11');
            $table->integer('kalkulus26');
            $table->integer('kalkulus46');
            $table->integer('kalkulus31');
            $table->integer('kalkulus36');
            $table->string('indeksdebris', 5);
            $table->string('indekskalkulus', 5);
            $table->string('ohis', 5);
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
        Schema::dropIfExists('odontograms');
    }
}
