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
		Schema::create('outlets', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('name')->unique();
			$table->text('address');
			$table->string('phone');
			$table->string('image')->nullable();
			$table->foreignId('user_id')->constrained()->onDelete('cascade');
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('outlets');
	}
};
