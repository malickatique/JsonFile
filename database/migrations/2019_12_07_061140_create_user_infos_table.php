<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            
            $table->string('type')->default('individual');  // or company
            $table->string('website')->nullable();

            // Company
            $table->string('company_name')->nullable();
            $table->string('position')->nullable();

            //User address
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('post_code')->nullable();

            $table->string('total_spent')->default('0');

            $table->timestamps();
        });
        $data =[
            [
                'user_id' => "1",
                'post_code' => "48000",
                'country' => "United States",
                'state' => "New York",
                'city' => "New York",
                'street' => "3212 Sunflower street",
            ],
        ];
        DB::table('user_infos')->insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_infos');
    }
}
