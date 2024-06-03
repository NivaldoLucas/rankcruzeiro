<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCustomersTableForReferrals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('recommendations'); // Remove o campo antigo
            $table->boolean('referral_1')->default(false); // Adiciona novos campos
            $table->boolean('referral_2')->default(false);
            $table->boolean('referral_3')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn(['referral_1', 'referral_2', 'referral_3']); // Remove os novos campos
            $table->integer('recommendations')->default(0); // Adiciona o campo antigo de volta
        });
    }
}

