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
        Schema::create('qr_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('department_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('name')->nullable()->comment('Department Name');
            $table->string('header')->nullable()->comment('Content Header');
            $table->string('title')->nullable()->comment('Content Title');
            $table->string('description')->nullable()->comment('Content Description');
            $table->string('footer')->nullable()->comment('Content Footer');
            $table->string('image')->nullable();
            $table->text('token')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_data');
    }
};
