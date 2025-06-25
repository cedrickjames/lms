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
            $table->string('status')->default('Pending');
            $table->integer('numberOfRequirement')->default(0);
            $table->integer('numberOfSubmittedRequirement')->default(0);
            $table->string('requestLetter')->nullable();
            $table->string('forecast')->nullable();
            $table->string('corMayorsPermitSubconInfoSheet')->nullable();
            $table->string('eCertificate')->nullable();
            $table->string('photo')->nullable();
            $table->string('orderForm')->nullable();
            $table->string('laborCost')->nullable();
            $table->string('suretyBond')->nullable();
            $table->string('ledgerLiquidation')->nullable();
            $table->string('certification')->nullable();
            $table->string('bocSuretyBondApplication')->nullable();

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
