<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('contact_msg', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
        $table->string('name');
        $table->string('email');
        $table->string('phone')->nullable();
        $table->text('msg');
        $table->string('subject');
        $table->enum('status', ['unread', 'read'])->default('unread');
        $table->boolean('is_active')->default(1);
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('contact_msg');
    }
};
