<?php

use Illuminate\Database\Migrations\Migration;
use App\Models\Topic;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Topic::create(['name' => 'World', 'slug' => 'world']);
        Topic::create(['name' => 'U.S.', 'slug' => 'us']);
        Topic::create(['name' => 'Technology', 'slug' => 'technology']);
        Topic::create(['name' => 'Design', 'slug' => 'design']);
        Topic::create(['name' => 'Culture', 'slug' => 'culture']);
        Topic::create(['name' => 'Business', 'slug' => 'business']);
        Topic::create(['name' => 'Politics', 'slug' => 'politics']);
        Topic::create(['name' => 'Opinion', 'slug' => 'opinion']);
        Topic::create(['name' => 'Science', 'slug' => 'science']);
        Topic::create(['name' => 'Health', 'slug' => 'health']);
        Topic::create(['name' => 'Style', 'slug' => 'style']);
        Topic::create(['name' => 'Travel', 'slug' => 'travel']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Topic::truncate();
    }
};
