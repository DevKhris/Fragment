<?php

namespace RubyNight\Migrations;

use RubyNight\Libs\Database;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    public static function up()
    {
        return Database::$capsule->schema()->create('users',function(Blueprint $table) 
        {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public static function down()
    {
        Database::$capsule->schema()->dropIfExists('users');
    }
}