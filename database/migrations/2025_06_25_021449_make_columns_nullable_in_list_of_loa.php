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
                     $table->string('requestLetter')->nullable()->change();
            $table->string('forecast')->nullable()->change();
            $table->string('corMayorsPermitSubconInfoSheet')->nullable()->change();
            $table->string('eCertificate')->nullable()->change();
            $table->string('photo')->nullable()->change();
            $table->string('orderForm')->nullable()->change();
            $table->string('laborCost')->nullable()->change();
            $table->string('suretyBond')->nullable()->change();
            $table->string('ledgerLiquidation')->nullable()->change();
            $table->string('certification')->nullable()->change();
            $table->string('bocSuretyBondApplication')->nullable()->change();

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
