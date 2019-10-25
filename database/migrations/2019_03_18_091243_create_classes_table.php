<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kelas',20);
            $table->timestamps();
        });

        // Set FK di kolom id_kelas di tabel students
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('id_kelas')
                    ->references('id')->on('classes')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign('students_id_kelas_foreign');
        });;

        Schema::dropIfExists('classes');
    }
}
