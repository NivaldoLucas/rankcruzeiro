<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
    Schema::create('customers', function (Blueprint $table) {
        $table->id();
        $table->string('store_name');
        $table->string('store_owner');
        $table->string('logo_url')->nullable();
        for ($i = 1; $i <= 2; $i++) {
            $table->boolean('dobrou_mes' . $i)->default(false);
        }
        $table->integer('recommendations')->default(0);
        $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

