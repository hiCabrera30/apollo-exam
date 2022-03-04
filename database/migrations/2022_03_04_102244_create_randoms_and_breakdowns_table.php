<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRandomsAndBreakdownsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('randoms', function (Blueprint $table) {
            $table->id();
            $table->string("value");
            $table->boolean("flag")->default(false);
        });
        
        Schema::create('breakdowns', function (Blueprint $table) {
            $table->id();
            $table->string("value");
            $table->unsignedBigInteger("random_id");
            
            $table->foreign('random_id')->references('id')->on('randoms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('breakdowns');
        Schema::dropIfExists('randoms');
    }
}
