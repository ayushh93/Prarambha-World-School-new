<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOnlineformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('onlineforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('inputGroupFile01');
            $table->text('upload');
            $table->string('name');
            $table->date('dob')->nullable();
            $table->string('pob')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->string('nationality')->nullable();
            $table->string('mothertongue')->nullable();
            $table->string('religion')->nullable();
            $table->string('appliedgrade')->nullable();
            $table->string('academicyear')->nullable();
            $table->string('stdntprmntaddress')->nullable();
            $table->string('stdntcurrentaddress')->nullable();
            $table->text('lastinfo')->nullable();
            $table->longText('activity')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->longText('medicalissue')->nullable();
            $table->enum('hostel',['Yes','No'])->default('No');
            $table->enum('transportation',['Yes','No'])->default('No');
            $table->string('pickup_point')->nullable();
            $table->enum('lunch',['Yes','No'])->default('No');
            $table->string('veg_nonveg')->nullable();
            $table->enum('afterschool',['Yes','No'])->default('No');
            $table->longText('after_school_program')->nullable();
            $table->text('fathername')->nullable();
            $table->string('fathercontact')->nullable();
            $table->text('mothername')->nullable();
            $table->string('mothercontact')->nullable();
            $table->text('guardianname')->nullable();
            $table->string('guardiancontact')->nullable();
            $table->text('sibling')->nullable();
            $table->text('hear')->nullable();
            $table->string('delarationInput')->nullable();
            $table->enum('declareRole',['parent','guardian','student']);
            $table->string('declaration2');
            $table->string('applicantscontact')->nullable();
            $table->string('applicantsemail')->email();
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
        Schema::dropIfExists('onlineforms');
    }
}
