<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataOMsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('data_o_m_s', function (Blueprint $table) {
      $table->id();
      $table->string('judul');
      $table->text('deskripsi');
      $table->string('gambar');
      $table->date('date');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('data_o_m_s');
  }
}
