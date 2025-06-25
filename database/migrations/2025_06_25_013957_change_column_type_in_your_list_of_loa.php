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
        
             $table->string('requestLetter')->change();
            $table->string('forecast')->change();
            $table->string('corMayorsPermitSubconInfoSheet')->change();
            $table->string('eCertificate')->change();
            $table->string('photo')->change();
            $table->string('orderForm')->change();
            $table->string('laborCost')->change();
            $table->string('suretyBond')->change();
            $table->string('ledgerLiquidation')->change();
            $table->string('certification')->change();
            $table->string('bocSuretyBondApplication')->change();
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
