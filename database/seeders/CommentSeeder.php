<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
            'content' => 'Primeiro comentário.',
            'post_id' => 1, // ID do post criado no PostSeeder
            'user_id' => 1, // ID do usuário criado no UserSeeder
        ]);

        DB::table('comments')->insert([
            'content' => 'Segundo comentário.',
            'post_id' => 1,
            'user_id' => 1,
        ]);
    }
}