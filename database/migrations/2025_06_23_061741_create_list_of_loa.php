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
        Schema::create('list_of_loa', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
             $table->string('loa');
             $table->string('type');
             $table->string('supplier');
             $table->string('accountHolder');
             $table->string('accountHolderEmail');
             $table->string('accountHolderDeptHead');
             $table->string('accountHolderDeptHeadEmail');
             $table->string('contractExpirationDate');
             $table->string('deadlineOfCompletion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('list_of_loa');
              $table->dropColumn('loa');
             $table->dropColumn('type');
             $table->dropColumn('supplier');
             $table->dropColumn('accountHolder');
             $table->dropColumn('accountHolderEmail');
             $table->dropColumn('accountHolderDeptHead');
             $table->dropColumn('accountHolderDeptHeadEmail');
             $table->dropColumn('contractExpirationDate');
             $table->dropColumn('deadlineOfCompletion');
    }
};
