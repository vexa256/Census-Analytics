<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('household_members', function (Blueprint $table) {
            $table->id();
            $table->string('HID');
            $table->string('MID');
            $table->string('Sex');
            $table->string('ResidentialStatus');
            $table->integer('Births');
            $table->integer('Deaths');
            $table->string('Ethnicity');
            $table->integer('Age');
            $table->string('Faith');
            $table->string('Education');
            $table->string('EmploymentStatus');
            $table->string('MaritalStatus');
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
        Schema::dropIfExists('household_members');
    }
};