<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username',60)->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone',15)->nullable();
            $table->text('permissions')->nullable();
            $table->tinyInteger('super_user');
            $table->dateTime('dob')->nullable();
            $table->string('address')->nullable();
            $table->integer('avatar_id')->nullable();
            $table->string('job_position',60)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('website',120)->nullable();
            $table->string('skype',120)->nullable();
            $table->string('interest')->nullable();
            $table->string('about',400)->nullable();
            $table->tinyInteger('completed_profile');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::statement('ALTER TABLE `users`'.
                             ' MODIFY COLUMN `super_user` tinyint(1) NOT NULL,'.
                             ' MODIFY COLUMN `completed_profile` tinyint(1) NOT NULL;');

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name',120);
            $table->string('slug',120);
            $table->text('permissions')->nullable();
            $table->string('description')->nullable();
            $table->tinyInteger('is_default');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();
        });

        Schema::create('role_users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('role_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('role_users');
    }
}
