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
        Schema::create('type_of_loa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->string('typeOfLOA');
             $table->string('nameOfLOA');
             $table->string('legend');
            $table->boolean('requestLetter');
            $table->boolean('forecast');
            $table->boolean('corMayorsPermitSubconInfoSheet');
            $table->boolean('eCertificate');
            $table->boolean('photo');
            $table->boolean('orderForm');
            $table->boolean('laborCost');
            $table->boolean('suretyBond');
            $table->boolean('ledgerLiquidation');
            $table->boolean('certification');
            $table->boolean('bocSuretyBondApplication');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('type_of_loa');
         $table->dropColumn('typeOfLOA');
            $table->dropColumn('requestLetter');
            $table->dropColumn('forecast');
            $table->dropColumn('corMayorsPermitSubconInfoSheet');
            $table->dropColumn('eCertificate');
            $table->dropColumn('photo');
            $table->dropColumn('orderForm');
            $table->dropColumn('laborCost');
            $table->dropColumn('suretyBond');
            $table->dropColumn('ledgerLiquidation');
            $table->dropColumn('certification');
            $table->dropColumn('bocSuretyBondApplication');
    }
};
