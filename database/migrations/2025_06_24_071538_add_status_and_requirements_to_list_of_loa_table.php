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
            $table->boolean('requestLetter')->default(false);
            $table->boolean('forecast')->default(false);
            $table->boolean('corMayorsPermitSubconInfoSheet')->default(false);
            $table->boolean('eCertificate')->default(false);
            $table->boolean('photo')->default(false);
            $table->boolean('orderForm')->default(false);
            $table->boolean('laborCost')->default(false);
            $table->boolean('suretyBond')->default(false);
            $table->boolean('ledgerLiquidation')->default(false);
            $table->boolean('certification')->default(false);
            $table->boolean('bocSuretyBondApplication')->default(false);

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
