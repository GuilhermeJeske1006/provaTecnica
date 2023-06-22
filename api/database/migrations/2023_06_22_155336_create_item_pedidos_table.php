<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('item_pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer("quantidade");
            $table->unsignedBigInteger("produto_Id");
            $table->unsignedBigInteger("pedido_Id");
            $table->timestamps();

            $table->foreign("produto_id")
                ->references("id")
                ->on("produtos")
                ->onDelete("cascade");

            $table->foreign("pedido_id")
                ->references("id")
                ->on("pedidos")
                ->onDelete("cascade");
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('item_pedidos', function (Blueprint $table) {
            $table->dropForeign(['produto_id']);
            $table->dropForeign(['pedido_id']);
        });
    
        Schema::dropIfExists('item_pedidos');
    }
};
