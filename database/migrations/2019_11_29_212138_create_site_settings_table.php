<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_logo_text')->nullable();
            $table->string('site_header_text')->nullable();
            $table->string('site_header_pic')->nullable();
            $table->string('site_about_us')->nullable();
            $table->string('site_address')->nullable();
            $table->string('site_location')->nullable();

            // Social Media Links
            $table->string('site_facebook')->default('#');
            $table->string('site_phone')->default('#');
            $table->string('site_email')->default('#');
            $table->string('site_instagram')->default('#');
            $table->string('site_twitter')->default('#');
            $table->string('site_linkedin')->default('#');

            $table->timestamps();
        });
        $configuration =[
            [
                'site_name' => "JsonFiles",
                'site_header_text' => "Convert Json files with just few Clicks!",
                'site_address' => "A123 Street, New York, United States",
                'site_location' => "New York",
                'site_logo_text' => "JsonFile",
                'site_header_pic' => "intro-img.svg",
                'created_at' => date("Y-m-d H:i:s")
            ],
        ];
        
        DB::table('site_settings')->insert($configuration);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}
