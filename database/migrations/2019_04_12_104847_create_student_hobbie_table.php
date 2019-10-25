<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentHobbieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_hobbies', function (Blueprint $table) {
            $table->integer('id_siswa')->unsigned()->index();
            $table->integer('id_hobi')->unsigned()->index();         
            $table->timestamps();

            //Set PK
            $table->primary(['id_siswa','id_hobi']);
            
            //Set FK
            $table->foreign('id_siswa')
                    ->references('id')
                    ->on('students')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            
            $table->foreign('id_hobi')
                    ->references('id')
                    ->on('hobbies')
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
        Schema::dropIfExists('student_hobbies');
    }
}
