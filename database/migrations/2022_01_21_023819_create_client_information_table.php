<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_information', function (Blueprint $table) {
            $table->id();
            $table->string('contact_person');
            $table->string('acount_name');
            $table->string('company_name')->nullable();;
            $table->string('website');
            $table->string('birthday')->nullable();;
            $table->string('address');
            $table->string('country')->nullable();;
            $table->string('email')->unique();
            $table->text('personalities')->nullable();;
            $table->string('communication_style')->nullable();;
            $table->string('civil_status')->nullable();;
            $table->integer('kids')->nullable();;
            $table->text('hobbies_sports')->nullable();;
            $table->text('notes')->nullable();;
            $table->string('client_status');
            $table->string('active_date')->nullable();;
            $table->string('last_active_date')->nullable();;
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
        Schema::dropIfExists('client_information');
    }
}
