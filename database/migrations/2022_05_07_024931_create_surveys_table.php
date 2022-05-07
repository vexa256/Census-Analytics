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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('SurveyID');
            $table->string('SubmittedBy');
            $table->string('HID');
            $table->bigInteger('Females')->default(0);
            $table->bigInteger('Males')->default(0);
            $table->bigInteger('PrimarySchoolEduction')->default(0);
            $table->bigInteger('HighSchoolEduction')->default(0);
            $table->bigInteger('TertiaryEducation')->default(0);
            $table->bigInteger('Christian')->default(0);
            $table->bigInteger('Moslem')->default(0);
            $table->bigInteger('IndigenousReligion')->default(0);
            $table->bigInteger('UnEmployed')->default(0);
            $table->bigInteger('Employed')->default(0);
            $table->bigInteger('Married')->default(0);
            $table->bigInteger('Divorced')->default(0);
            $table->bigInteger('NotMarried')->default(0);
            $table->bigInteger('Deaths')->default(0);
            $table->bigInteger('RecentBirths')->default(0);
            $table->bigInteger('BelowFiveYears')->default(0);
            $table->bigInteger('BelowEighteenYears')->default(0);
            $table->bigInteger('BelowThirtyFiveYears')->default(0);
            $table->bigInteger('BelowFortyFiveYears')->default(0);
            $table->bigInteger('AboveFortyFiveYears')->default(0);
            $table->bigInteger('Year');

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
        Schema::dropIfExists('surveys');
    }
};