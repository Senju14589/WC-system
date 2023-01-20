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
        Schema::create('timechecks', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('location')->nullable();
            $table->string('status');
            $table->string('note');
            $table->timestamp('created_at')->useCurrent()->setTimeFormat('H:i:s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('timechecks', function (Blueprint $table) {
            $table->dropColumn('location');
        });
    }
};