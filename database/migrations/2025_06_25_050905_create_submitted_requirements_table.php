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
        Schema::create('submitted_requirements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('loaId');
            $table->string('loaName');
            $table->string('requirement');
            $table->string('requirementName');
            $table->string('accountHolderUserName');
            $table->string('accountHolderName');
            $table->string('emailStatus');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submitted_requirements');
    }
};
