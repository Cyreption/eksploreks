<?php

// Author: Aulia Salma Anjani (5026231063)

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
        Schema::create('recruitment_posts', function (Blueprint $table) {
            $table->id('recruitment_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('organization');
            $table->string('location');
            $table->date('deadline');
            $table->string('application_link')->nullable();
            $table->string('file_link')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
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
