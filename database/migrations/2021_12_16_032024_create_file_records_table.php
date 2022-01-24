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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('birthday');
            $table->enum('gender',['Male','Female']);
            $table->enum('marital_status',['Single', 'Married', 'Widowed', 'Devorced']);
            $table->string('spouce_work')->nullable();
            $table->string('spouce_name')->nullable();
            $table->string('spouce_birthdate')->nullable();
            $table->integer('no_children')->nullable();
            $table->string('personal_email');
            $table->string('phone_no')->nullable();
            $table->string('cel_no');
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('emergency_name')->nullable();
            $table->string('emergency_relation')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->string('work_email')->nullable();
            $table->string('pay_slip_link');
            $table->integer('update_request');
            $table->string('date_hired');
            $table->string('date_end');
            $table->enum('contract_status', ['Interns', 'Probitionary', 'Regular', 'End of Contract', 'AWOL', 'Leave', 'OJT']);
            $table->timestamps();
        });
    }

    /** 
     * FILE 201 Records
     * 
     * Employee ID   X
     * Last Name   /
     * First Name /
     * Middle Name / 
     * Designation X
     * Position / $user
     * Type of Contract X
     * Contracts /
     * Notes X
     * Date Hired
     * Proby Extension
     * Regularization Date
     * Employement Status
     * Contract Status
     * No.of Service
     * 5 SIL Entitlement
     * Monthly Basic Salary
     * Daily Basic Salary
     * Hourly Rate
     * OT Rate
     * Daily Total
     * Transpo Allowance
     * Birthday
     * Age
     * Gender
     * Civil Status
     * Mobile No
     * Email Address
     * Personal Address
     * Account Number
     * TIN
     * Philhealth
     * SSS
     * Pagibig
     * HMO
     * Home Address
     * Contact Person in case of Emergency 1
     * Relationship 1
     * Contact No.1
     * Contact Person in case of Emergency 2
     * Relationship 2
     * Contact No.2
     * 
    */

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
