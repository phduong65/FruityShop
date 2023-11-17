<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Điều chỉnh nếu bạn không sử dụng bảng người dùng tích hợp sẵn
            $table->foreignId('product_id')->constrained();
            $table->string('product_name');
            $table->decimal('product_price', 10, 2);
            $table->string('product_image');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
