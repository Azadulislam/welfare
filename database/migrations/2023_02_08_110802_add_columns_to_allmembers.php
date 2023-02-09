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
        Schema::table('all_members', function (Blueprint $table) {
            $table->string('ic_section')->nullable()->after('ic_district');
            $table->string('home_section')->nullable()->after('home_district');
            $table->string('beneficiary_name')->nullable()->after('member_status_ids');
            $table->string('beneficiary_ic')->nullable()->after('member_status_ids');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('all_members', function (Blueprint $table) {
            $table->dropColumn(['ic_section', 'home_section', 'beneficiary_name', 'beneficiary_ic']);
        });
    }
};
