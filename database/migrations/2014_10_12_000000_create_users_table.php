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
            $table->string('name_english')->nullable();
            $table->string('email')->unique();

            $table->bigInteger('employee_id')->nullable();

            $table->string('password')->nullable();
            $table->enum('user_type', ['system', 'hr', 'employee', 'chairman', 'director_general', 'director_admin'])->default('system');

            $table->unsignedTinyInteger('belongs_to')->default(0)->comment('0=SYSTEM 1=HR and 2=EMPLOYEE. User belongs to council except 0');
            $table->unsignedTinyInteger('role_id');
            $table->longText('accesses')->nullable()->comment('All the named routes will be the accesses for roles');
            $table->string('permissions')->nullable()->comment('Create,Read,Update,Delete will be the permissions');
            $table->rememberToken();


            $table->string('name_bangla')->nullable();
            $table->string('father_name_english')->nullable();
            $table->string('father_name_bangla')->nullable();
            $table->string('mother_name_english')->nullable();
            $table->string('mother_name_bangla')->nullable();
            $table->string('spouse_name1')->nullable();
            $table->string('spouse_name2')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender')->comment('1=Male,2=Female,3=Others')->nullable();
            $table->boolean('marital_status')->comment('1=Married,2=Unmarried')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nid')->nullable();
            $table->string('mobile')->nullable();
            $table->string('present_address_english')->nullable();
            $table->string('present_address_bangla')->nullable();
            $table->string('permanent_address_bangla')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('designation_id')->nullable();
            $table->date('date_of_join')->nullable();


            $table->date('commission_date')->nullable();
            $table->date('promotion_date')->nullable();
            $table->string('telephone_office')->nullable();
            $table->string('telephone_home')->nullable();
            $table->string('pbx')->nullable();
            $table->bigInteger('salary')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_relation')->nullable();
            $table->string('employee_sign')->nullable();
            $table->text('employee_photo')->nullable();


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
