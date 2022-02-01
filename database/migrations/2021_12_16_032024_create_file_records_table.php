<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('employee_id');
            $table->string('first_name'); 
            $table->string('last_name'); 
            $table->string('middle_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('type_of_contract')->nullable();
            $table->string('contracts')->nullable();;
            $table->text('notes')->nullable();;
            $table->string('date_hired')->nullable();;
            $table->string('proby_extension')->nullable();
            $table->string('regular_date')->nullable();
            $table->string('contract_status')->nullable();;
            $table->string('no_of_service')->nullable();
            $table->string('sil_entitlement')->nullable();;
            $table->string('birthday')->nullable();;
            $table->integer('age')->nullable();;
            $table->enum('gender',['Male','Female']);
            $table->enum('marital_status',['Single', 'Married', 'Widowed', 'Devorced']);
            $table->string('cel_no');
            $table->string('work_email')->nullable();
            $table->string('personal_email')->nullable();;
            $table->string('account_number')->nullable();
            $table->string('TIN')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('sss')->nullable();
            $table->string('pagibig')->nullable();
            $table->string('hmo')->nullable();
            $table->string('address_1');
            $table->string('emergency_name')->nullable();
            $table->string('emergency_relation')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('emergency_name2')->nullable();
            $table->string('emergency_relation2')->nullable();
            $table->string('emergency_contact2')->nullable();
            $table->string('pay_slip_link')->nullable();
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
        Schema::dropIfExists('file_records');
    }
}
