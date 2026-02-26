<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('center_id')->nullable()->constrained('centers')->index();
            $table->string('password', 150);
            $table->enum('role', ['admin', 'coordinator', 'staff'])->index();
            $table->string('first_name', 30)->nullable();
            $table->string( 'middle_name', 30)->nullable();
            $table->string('last_name', 30)->nullable();
            $table->string('address')->nullable()->nullable();
            $table->string('village', 30)->nullable();
            $table->string('taluko', 30)->nullable();
            $table->string('district', 30)->nullable();
            $table->string('phone_number', 12);
            $table->string('email', 50)->unique();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
