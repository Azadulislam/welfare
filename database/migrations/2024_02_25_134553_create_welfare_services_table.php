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
        Schema::create('welfare_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('member_id')->unsigned();
            $table->bigInteger('help_cat_id')->unsigned();
            $table->timestamp('date_apply')->nullable();
            $table->string('zakat_center', 55)->nullable();
            $table->string('zakat_years', 255)->nullable();
            $table->text('remarks')->nullable();
            $table->string('attached_file1', 100)->nullable();
            $table->string('attached_file2', 100)->nullable();
            $table->string('attached_file3', 100)->nullable();
            $table->string('attached_file4', 100)->nullable();
            $table->string('informer_name', 100)->nullable();
            $table->timestamp('last_edited_date')->nullable();
            $table->timestamps();

            $table->foreign('help_cat_id')->on('help_categories')->references('id')->onDelete('cascade');
            $table->foreign('member_id')->on('all_members')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('welfare_services');
    }
};
