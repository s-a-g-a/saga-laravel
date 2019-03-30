<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Evaluationresult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
         Schema::create('evaluationResult', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cms_users_id')->nullable();
            $table->string('inclass')->nullable();
            $table->string('inlab')->nullable();
            $table->string('timeusage')->nullable();
            $table->string('communwithstud')->nullable();
});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
