<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('swc_no');
            $table->text('name');
            $table->text('address');
            $table->text('contactperson');
            $table->integer('phone');
            $table->integer('sponsor_id');
            $table->text('tags');
            $table->integer('district_id');
            $table->date('approved_date');
            $table->text('description');
            $table->text('email');
            $table->text('website');
            $table->text('affiliation');
            $table->date('estab_date');
            $table->text('category');
            $table->integer('logo_id');
            $table->timestamps();
        });

         Schema::create('organization_project', function (Blueprint $table) {
            $table->integer('organization_id');
            $table->integer('project_id');
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
        Schema::dropIfExists('organizations');
    }
}
