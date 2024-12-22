<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('about')->nullable();
        $table->text('work_experience')->nullable();
        $table->integer('year_experience')->nullable();
        $table->string('facebook')->nullable();
        $table->string('twitter')->nullable();
        $table->text('available_time')->nullable();
        $table->string('profile_img')->nullable();
        $table->foreignId('specialization_id')->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');  // Make specialization_id nullable
        $table->string('email')->unique();
        $table->string('password');
        $table->decimal('rating', 3, 2)->default(0);
        $table->string('phone')->nullable();
        $table->boolean('is_admin_added')->default(true);
        $table->boolean('is_active')->default(1);
        $table->timestamps();
    });
}


    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
