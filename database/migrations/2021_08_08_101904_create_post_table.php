<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


// lệnh tạo bảng: php artisan make:migration create_post_table

// LỆNH TẠO lại BẢNG php artisan migrate

// LỆNH xóa BẢNG php artisan migrate:rollback


class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->string('title')->default('not Subject'); // để thành gtri mặc định
            $table->text('body')->nullable(); // xét thành giá trị rỗng
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
        Schema::dropIfExists('post');
    }
}

