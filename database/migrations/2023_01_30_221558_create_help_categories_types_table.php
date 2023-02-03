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
        Schema::create('help_categories_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('help_category_id')->unsigned();
            $table->bigInteger('help_type_id')->unsigned();

            $table->foreign('help_category_id')->on('help_categories')->references('id')->onDelete('cascade');
            $table->foreign('help_type_id')->on('help_types')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_categories_types');
    }
};
