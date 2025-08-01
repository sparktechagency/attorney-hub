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
        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->enum('user_type', ['admin', 'attorny', 'user'])->default('admin');
            $table->rememberToken();

            $table->string('mobile')->nullable();
            $table->string('present_address_english')->nullable();

            $table->unsignedTinyInteger('status')->comment('0=Inactive,1=Active');


            
            $table->timestamp('created_at')->nullable();
            $table->unsignedInteger('created_by')->nullable();

            $table->timestamp('updated_at')->nullable();
            $table->unsignedInteger('updated_by')->nullable();

            $table->timestamp('deleted_at')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
