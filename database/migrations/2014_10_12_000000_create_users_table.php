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
            $table->string('phone')->nullable();
            $table->string('imageurl')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->string('type')->default('individual');  // or company

            // Company
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();

            //User address
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('post_code')->nullable();

        });
        $data =[
            [
                'name' => "user",
                'role' => "user",
                'email' => "user@test.com",
                'password' => bcrypt('123456'),
                'created_at' => date("Y-m-d H:i:s")
            ],
            [
                'name' => "admin",
                'role' => "admin",
                'email' => "admin@test.com",
                'password' => bcrypt('123456'),
                'created_at' => date("Y-m-d H:i:s")
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
