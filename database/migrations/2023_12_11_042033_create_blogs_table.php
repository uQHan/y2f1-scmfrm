<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id('blog_id');
            $table->foreignIdFor(User::class, 'user_id')->constrained(table: 'users' ,column: 'user_id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->tinyText('title');
            $table->tinyText('tags')->nullable();
            $table->text('content');
            $table->tinyText('image_url')->nullable();
            $table->boolean('locked')->default(false);
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
