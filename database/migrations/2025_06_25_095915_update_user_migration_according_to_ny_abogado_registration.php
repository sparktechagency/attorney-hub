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
        Schema::table('users', function (Blueprint $table) {
            $table->string('company_name')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('area_of_practice')->nullable();
            $table->string('state_of_bar_admission_and_court')->nullable();
            $table->string('year_of_admission_to_bar')->nullable();
            $table->string('website')->nullable();
            $table->string('login_name')->nullable();
            $table->boolean('free_trial')->nullable();
            $table->boolean('payment_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'company_name',
                'address1',
                'address2',
                'city',
                'state',
                'zip',
                'area_of_practice',
                'state_of_bar_admission_and_court',
                'year_of_admission_to_bar',
                'website',
                'login_name',
                'free_trial',
                'payment_status',
            ]);
        });
    }
};
