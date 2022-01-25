<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReprimandUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reprimand_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('type_of_offense');
            $table->text('detail_reports');
            $table->string('no_of_offense');
            $table->string('issue_by');
            $table->string('date_given');
            $table->string('status');
            $table->text('written_explanation')->nullable();
            $table->text('explanation_date')->nullable();
            $table->text('actions_taken')->nullable();
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
        Schema::dropIfExists('reprimand_users');
    }
}
