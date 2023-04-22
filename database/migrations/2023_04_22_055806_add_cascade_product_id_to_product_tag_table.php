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
        Schema::table('product_tag', function (Blueprint $table) {
            $table->dropForeign('product_tags_product_id_foreign');
            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_tag', function (Blueprint $table) {
            $table->dropForeign('product_tags_product_id_foreign');
            $table->foreignId('product_id')->nullable()->index()->constrained('products');

        });
    }
};
