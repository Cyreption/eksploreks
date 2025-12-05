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
        Schema::table('places', function (Blueprint $table) {
            $table->string('distance', 50)->nullable()->after('image');
            $table->integer('reviews')->nullable()->after('distance');
            $table->boolean('is_top')->default(false)->after('reviews');
            $table->decimal('price_rating', 3, 1)->nullable()->after('is_top');
            $table->decimal('location_rating', 3, 1)->nullable()->after('price_rating');
            $table->decimal('service_rating', 3, 1)->nullable()->after('location_rating');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('places', function (Blueprint $table) {
            $table->dropColumn(['distance', 'reviews', 'is_top', 'price_rating', 'location_rating', 'service_rating']);
        });
    }
};
