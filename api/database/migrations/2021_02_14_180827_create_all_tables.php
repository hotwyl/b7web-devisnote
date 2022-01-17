<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('description');
            $table->boolean('state')->default(0);
            $table->timestamps();
        });

        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('description');
            $table->unsignedBigInteger('id_project');
            $table->foreign('id_project')->references('id')->on('project')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('assignment', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('body');
            $table->string('description');
            $table->boolean('state')->default(1);
            $table->unsignedBigInteger('id_project');
            $table->foreign('id_project')->references('id')->on('project')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project');
        Schema::dropIfExists('notes');
        Schema::dropIfExists('assignment');
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('failed_jobs');

    }
}
