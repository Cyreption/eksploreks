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
        // Cek apakah kolom image sudah ada
        if (Schema::hasTable('recruitment_posts') && !Schema::hasColumn('recruitment_posts', 'image')) {
            Schema::table('recruitment_posts', function (Blueprint $table) {
                $table->string('image')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('recruitment_posts', 'image')) {
            Schema::table('recruitment_posts', function (Blueprint $table) {
                $table->dropColumn('image');
            });
        }
    }
};
