<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->longText('description')->nullable();
						//$table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('email', 150)->nullable();
            $table->date('date')->nullable();

            // $table->json('json');
            // $table->integer('number');

            // SQL Error below is caused by JSON or Interger Migrations - Possible confilct with MarianDB

            // [Illuminate\Database\QueryException]
            // SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to y
            // our MariaDB server version for the right syntax to use near 'json not null) default character set utf8mb4 collate utf8mb4_unicode_ci
            // ' at line 1 (SQL: create table `examples` (`id` int unsigned not null auto_increment primary key, `created_at` timestamp null, `upda
            // ted_at` timestamp null, `example` varchar(255) not null, `description` longtext null, `email` varchar(255) null, `image` varchar(255
            // ) null, `date` date null, `json` json not null) default character set utf8mb4 collate utf8mb4_unicode_ci)

            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('samples');
    }
}
