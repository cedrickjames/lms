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
        Schema::table('list_of_loa', function (Blueprint $table) {
             $table->integer('numberOfConfirmedRequirements')->default(0)->after('numberOfSubmittedRequirement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_of_loa', function (Blueprint $table) {
            //
        });
    }
};
