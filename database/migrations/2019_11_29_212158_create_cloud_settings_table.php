<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCloudSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cloud_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('disk_name');
            $table->string('token')->nullable();
            $table->string('folder')->nullable();
            $table->timestamps();
        });
        
        $configuration =[
            [
                'disk_name' => "dropbox",
                'token' => "OVR",
                'folder' => "user-uploads"
            ],
        ];
        DB::table('cloud_settings')->insert($configuration);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cloud_settings');
    }
}
