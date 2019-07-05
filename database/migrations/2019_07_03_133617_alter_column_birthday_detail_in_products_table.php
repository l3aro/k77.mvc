<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnBirthdayDetailInProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->longText('detail')->nullable()->change();
            $table->date('birthday')->nullable()->change();

            $table->dropColumn('votes');
            $table->renameColumn('is_highlight', 'is_public');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('detail')->nullable()->change();
            $table->dateTime('birthday')->nullable()->change();

            $table->integer('votes')->nullable()->after('name');
            $table->renameColumn('is_public', 'is_highlight');
        });
    }
}
