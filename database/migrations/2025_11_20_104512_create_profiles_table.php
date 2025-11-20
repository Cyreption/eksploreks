<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /**
         * BASE TABLES (tanpa foreign key)
         * academic_calendars, chat_rooms, places, users
         */

        Schema::create('academic_calendars', function (Blueprint $table) {
            $table->bigIncrements('calendar_id');
            $table->string('department', 100)->nullable();
            $table->timestampTz('created_at')->useCurrent();
        });

        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->bigIncrements('chat_id');
            // DDL pakai "name" varchar(100) NULL
            $table->string('name', 100)->nullable();
        });

        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('place_id');
            $table->string('name', 150)->nullable();
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->decimal('rating', 3, 2)->nullable();
            $table->string('price_range', 50)->nullable();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('username', 100);
            $table->string('email', 150);
            $table->string('password_hash', 255);
            $table->string('full_name', 150)->nullable();
            $table->string('institution', 150)->nullable();
            $table->string('department', 100)->nullable();
            $table->date('birth_date')->nullable();
            $table->text('avatar_url')->nullable();
            $table->text('description')->nullable();
            $table->timestampTz('created_at')->useCurrent();

            $table->unique('email', 'users_email_key');
            $table->unique('username', 'users_username_key');
        });

        /**
         * TABLES DENGAN FOREIGN KEY
         */

        // profiles
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('profile_id');
            $table->unsignedBigInteger('user_id');
            $table->text('bio')->nullable();
            $table->text('interests')->nullable();
            $table->integer('followers_count')->default(0);
            $table->integer('following_count')->default(0);

            $table->unique('user_id', 'profiles_user_id_key');

            $table->foreign('user_id', 'fk_profiles_user')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
        });

        // events
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('event_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 150)->nullable();
            $table->text('description')->nullable();
            $table->string('organizer', 150)->nullable();
            $table->string('location', 150)->nullable();
            $table->text('registration_link')->nullable();
            $table->timestampTz('start_time')->nullable();
            $table->timestampTz('end_time')->nullable();
            $table->text('file_link')->nullable();
            $table->timestampTz('created_at')->useCurrent();

            $table->foreign('user_id', 'fk_events_user')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');
        });

        // recruitment_posts
        Schema::create('recruitment_posts', function (Blueprint $table) {
            $table->bigIncrements('recruitment_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title', 150)->nullable();
            $table->text('description')->nullable();
            $table->string('organization', 150)->nullable();
            $table->string('location', 150)->nullable();
            $table->text('application_link')->nullable();
            $table->date('deadline')->nullable();
            $table->text('file_link')->nullable();
            $table->timestampTz('created_at')->useCurrent();

            $table->foreign('user_id', 'fk_recruitment_user')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->index('user_id', 'idx_recruitment_user');
        });

        // friend_requests
        Schema::create('friend_requests', function (Blueprint $table) {
            $table->bigIncrements('request_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status', 50)->nullable();
            $table->timestampTz('sent_at')->useCurrent();
            $table->timestampTz('responded_at')->nullable();

            $table->foreign('user_id', 'fk_friend_requests_user')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->index('user_id', 'idx_friend_requests_user');
        });

        // friend_list
        Schema::create('friend_list', function (Blueprint $table) {
            $table->bigIncrements('friend_list_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('friend_id');
            $table->timestampTz('created_at')->useCurrent();

            $table->unique(['user_id', 'friend_id'], 'uq_friend_pair');

            $table->foreign('user_id', 'fk_friend_list_user')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('friend_id', 'fk_friend_list_friend')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->index('friend_id', 'idx_friend_list_friend');
            $table->index('user_id', 'idx_friend_list_user');
        });

        // messages
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('message_id');
            $table->unsignedBigInteger('chat_id');
            $table->unsignedBigInteger('sender_id');
            $table->text('content')->nullable();
            $table->timestampTz('sent_at')->useCurrent();
            $table->timestampTz('read_at')->nullable();

            $table->foreign('chat_id', 'fk_messages_chat')
                ->references('chat_id')
                ->on('chat_rooms')
                ->onDelete('cascade');

            $table->foreign('sender_id', 'fk_messages_sender')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->index('chat_id', 'idx_messages_chat');
            $table->index('sender_id', 'idx_messages_sender');
        });

        // reviews
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('review_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('place_id');
            $table->integer('rating')->nullable();
            $table->text('comment')->nullable();
            $table->timestampTz('created_at')->useCurrent();

            $table->foreign('user_id', 'fk_reviews_user')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('place_id', 'fk_reviews_place')
                ->references('place_id')
                ->on('places')
                ->onDelete('cascade');

            $table->index('place_id', 'idx_reviews_place');
            $table->index('user_id', 'idx_reviews_user');
        });

        // saved_places
        Schema::create('saved_places', function (Blueprint $table) {
            $table->bigIncrements('saved_place_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('place_id');
            $table->timestampTz('saved_at')->useCurrent();

            $table->unique(['user_id', 'place_id'], 'uq_saved_place');

            $table->foreign('user_id', 'fk_saved_places_user')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('place_id', 'fk_saved_places_place')
                ->references('place_id')
                ->on('places')
                ->onDelete('cascade');

            $table->index('place_id', 'idx_saved_place');
            $table->index('user_id', 'idx_saved_user');
        });

        // calendar_events
        Schema::create('calendar_events', function (Blueprint $table) {
            $table->bigIncrements('calendar_event_id');
            $table->unsignedBigInteger('calendar_id');
            $table->string('title', 150)->nullable();
            $table->timestampTz('date_time')->nullable();
            $table->boolean('all_day')->default(false);
            $table->text('description')->nullable();
            $table->timestampTz('created_at')->useCurrent();
            $table->unsignedBigInteger('user_id');

            $table->foreign('calendar_id', 'fk_calendar_events_calendar')
                ->references('calendar_id')
                ->on('academic_calendars')
                ->onDelete('cascade');

            $table->foreign('user_id', 'fk_calendar_events_user')
                ->references('user_id')
                ->on('users')
                ->onDelete('cascade');

            $table->index('calendar_id', 'idx_calendar_events_calendar');
            $table->index('user_id', 'idx_calendar_events_user');
        });

        /**
         * CHECK CONSTRAINTS (pakai DB::statement setelah tabelnya ada)
         */

        // chk_event_time
        DB::statement("
            ALTER TABLE events
            ADD CONSTRAINT chk_event_time
            CHECK (
                end_time IS NULL
                OR start_time IS NULL
                OR end_time >= start_time
            )
        ");

        // chk_not_self
        DB::statement("
            ALTER TABLE friend_list
            ADD CONSTRAINT chk_not_self
            CHECK (user_id <> friend_id)
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Urutan dibalik supaya FK tidak error saat drop
        Schema::dropIfExists('calendar_events');
        Schema::dropIfExists('saved_places');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('friend_list');
        Schema::dropIfExists('friend_requests');
        Schema::dropIfExists('recruitment_posts');
        Schema::dropIfExists('events');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('places');
        Schema::dropIfExists('chat_rooms');
        Schema::dropIfExists('academic_calendars');
        Schema::dropIfExists('users');
    }
};