<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 데이터를 얼마나 만들지 결정해줌
        Todo::factory(50)->create();
        
        // php artisan db:seed 실행시 DatabaseSeeder가 실행됨.
        // 방법 1) php artisan db:seed --class=TodoSeeder 로 실행시켜주기
        // 방법 2) DatabaseSeeder에 $this->call(TodoSeeder::class); 추가

    }
}
