<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigatorsTable extends Migration
{
    public function up()
    {
        Schema::create('navigators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->boolean('lions');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navigators');
    }
}
