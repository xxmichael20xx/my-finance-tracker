<?php

use App\Enum\ExpenseStatusEnum;
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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('expense_type_id');
            $table->foreign('expense_type_id')->references('id')->on('expense_types');
            $table->float('amount', 2);
            $table->integer('status')->default(ExpenseStatusEnum::NORMAL);
            $table->timestamp('date_paid')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->json('metadata')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
