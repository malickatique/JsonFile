<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('role')->default('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('imageurl')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        $data =[
            [
                'name' => "user",
                'role' => "user",
                'email' => "user@test.com",
                'password' => bcrypt('123456'),
            ],
            [
                'name' => "admin",
                'role' => "admin",
                'email' => "admin@test.com",
                'password' => bcrypt('123456'),
            ],
        ];
        DB::table('users')->insert($data);
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
}
