<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const TABLE_NAME = 'freezer_items';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->double('size', 1, 6)->comment('Размер товара в м^3');
            $table->foreignId('freezer_id')
                ->comment('Холодильник')
                ->index()
                ->constrained('freezers')
                ->cascadeOnDelete();
            $table->unsignedInteger('final_price')->comment('Итоговая цена');
            $table->date('expired_at')->comment('Окончание годности товара');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
