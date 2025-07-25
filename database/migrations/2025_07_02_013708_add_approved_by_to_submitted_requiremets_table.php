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
        Schema::table('submitted_requirements', function (Blueprint $table) {
             $table->string('approvedBy');
           $table->string('approvedById');
           $table->string('approvedByEmail');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('submitted_requirements', function (Blueprint $table) {
            //
        });
    }
};
