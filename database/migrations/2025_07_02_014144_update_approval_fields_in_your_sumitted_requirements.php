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
            
    $table->string('approvedBy')->nullable()->change();
     $table->string('approvedById')->nullable()->change();
     $table->string('approvedByEmail')->nullable()->change();

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
            
    $table->string('approvedBy')->nullable(false)->change();
     $table->string('approvedById')->nullable(false)->change();
    $table->string('approvedByEmail')->nullable(false)->change();

        });
    }
};
