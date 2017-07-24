<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('address');
            $table->text('email');    
            $table->text('website');
            $table->integer('logo_id');
            $table->integer('sector_id');
            $table->text('tags');
            $table->text('description');  
            $table->date('estdate');
            $table->integer('district_id');
            $table->bigInteger('ph_number');
            $table->timestamps();
        });

        Schema::create('donor_project', function (Blueprint $table) {
            $table->integer('donor_id');
            $table->integer('project_id');
            $table->primary(['donor_id', 'project_id']);
        });

        Schema::create('donor_organization', function (Blueprint $table) {
            $table->integer('organization_id');
            $table->integer('donor_id');
            $table->primary(['organization_id', 'project_id']);
        });

        
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donors');
        Schema::dropIfExists('donor_organization');
        Schema::dropIfExists('donor_project');
    }
    
}
