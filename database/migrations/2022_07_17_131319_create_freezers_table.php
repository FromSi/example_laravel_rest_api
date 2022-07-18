<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private const TABLE_NAME = 'freezers';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->smallInteger('temperature')->comment('Температура помещения');
            $table->unsignedTinyInteger('size')->comment('Размер хранилища в м^3');
            $table->integer('price')->comment('Стоимость хранения');
            $table->foreignId('location_city_id')
                ->comment('Локация: город')
                ->index()
                ->constrained('location_cities')
                ->cascadeOnDelete();
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
