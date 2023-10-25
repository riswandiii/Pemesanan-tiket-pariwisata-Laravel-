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
        Schema::create('parawisatas', function (Blueprint $table) {
            $table->id();
            $table->string('parawisata');
            $table->string('alamat');
            $table->text('tentang');
            $table->string('image');
            $table->integer('harga');
            $table->text('maps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parawisatas');
    }
};
