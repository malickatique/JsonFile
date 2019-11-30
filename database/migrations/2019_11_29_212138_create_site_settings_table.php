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
            $table->timestamps();
        });
        // $configuration =[
        //     [
        //         'name' => "name",
        //         'value' => "OVR",
        //         'created_at' => date("Y-m-d H:i:s")
        //     ],
        //     [
        //         'name' => "description",
        //         'value' => "Propert Rental",
        //         'created_at' => date("Y-m-d H:i:s")
        //     ],
        //     [
        //         'name' => "logo",
        //         'value' => "",
        //         'created_at' => date("Y-m-d H:i:s")
        //     ],
        //     [
        //         'name' => "favicon",
        //         'value' => "",
        //         'created_at' => date("Y-m-d H:i:s")
        //     ],
        //     [
        //         'name' => "contact_us_email",
        //         'value' => "info@ovr.com",
        //         'created_at' => date("Y-m-d H:i:s")
        //     ],
        //     [
        //         'name' => "phone",
        //         'value' => "111128128",
        //         'created_at' => date("Y-m-d H:i:s")
        //     ],
        //     [
        //         'name' => "currency",
        //         'value' => "Dollar",
        //         'created_at' => date("Y-m-d H:i:s")
        //     ]
        // ];
        
        // DB::table('configurations')->insert($configuration);
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
