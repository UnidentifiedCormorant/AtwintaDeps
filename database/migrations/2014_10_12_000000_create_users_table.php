<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //TODO: добавить в новой миграции is_finished
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable()->default(null);
            $table->longText('about')->nullable()->default(null);
            $table->string('type')->nullable()->default(null);
            $table->string('github')->nullable()->default(null);
            $table->string('city')->nullable()->default(null);
            $table->string('phone')->nullable()->default(null);
            $table->string('birthday')->nullable()->default(null);
            $table->string('telegram')->nullable()->default(null);
            $table->string('adopted_at')->nullable()->default(null);

            $table->unsignedBigInteger('position_id')->nullable()->default(null);

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
    }
};
