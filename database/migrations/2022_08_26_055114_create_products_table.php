<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create( 'products', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'code' );
            $table->string( 'name' );
            $table->string( 'type' )->default( 'plain' );
            $table->boolean( 'availability' )->default( true );
            $table->boolean( 'needing_repair' )->default( false );
            $table->string( 'durability' );
            $table->string( 'max_durability' );
            $table->string( 'mileage' )->nullable();
            $table->string( 'price' );
            $table->string( 'minimum_rent_period' );
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists( 'products' );
    }
};
