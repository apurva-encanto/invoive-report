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
        Schema::create('reports', function (Blueprint $table) {
        $table->id();
        $table->integer('department_id');
        $table->string('report_type');
        $table->date('invoice_date');
        $table->date('due_date');
        $table->integer('customer_id');
        $table->string('report_no');
        $table->enum('status', ['open', 'paid', 'close']);
        $table->enum('is_recurrent', ['0', '1']);
        $table->enum('month', ['0', '1','2']);
        $table->integer('create_by')->nullable();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
