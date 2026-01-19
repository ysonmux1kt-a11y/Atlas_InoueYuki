<?php
use Illuminate\Database\Migrations\Migration;
//Migration を継承したクラス 1ファイル = 1テーブル（が基本）
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//テーブルを作る処理(php artisan migrate)
    {
        Schema::create('users', function (Blueprint $table) {
            //$table にカラム定義を書く
            $table->id(); // 自動インクリメントの符号なし整数のプライマリキー
            $table->string('username', 255);
            $table->string('email', 255)->unique(); // 一意制約
            $table->string('password', 255);
            $table->string('bio', 400)->nullable();
            $table->string('icon_image', 255)->default('icon1.png');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//テーブルを削除する処理(php artisan migrate:rollback)
    {
        Schema::dropIfExists('users');
    }
}
