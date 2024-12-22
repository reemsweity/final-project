<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->nullable(); // Optional phone field
            $table->enum('role', ['super_admin', 'admin'])->default('admin'); // Role field
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->softDeletes(); // Soft delete support
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
