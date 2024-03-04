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
        Schema::create('project_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id')->nullable();
            $table->integer('report_id')->nullable();
            $table->string('r_price');
            $table->date('invoice_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('hsn_code')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->integer('type')->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->double('discount')->nullable();
            $table->double('sub_total')->nullable();
            $table->double('gst')->nullable();
            $table->double('shipping')->nullable();
            $table->double('tax_vat')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_reports');
    }
};
