<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\PostStatus;
use App\Models\Reaction;
use App\Models\ReactionType;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // # 1 - users
        User::factory(50)->create();

        // # 2 - reaction_types
        $react_types = [
            'like',
            'love',
            'haha',
            'wow',
            'sad',
            'angry',
        ];

        foreach ($react_types as $type) {
            ReactionType::factory()->create([
                'type' => $type,
            ]);
        }

        // # 3 - post_statuses
        $post_statuses_types = [
            'Pending', 'Published', 'Canceled', 'Reviewed', 'Saved'
        ];

        foreach ($post_statuses_types as $type) {
            PostStatus::factory()->create([
                'type' => $type
            ]);
        }

        // # 4 - posts
        Post::factory(260)->create();

        // # 5 - reactions
        Reaction::factory(420)->create();

        // # 6 - comments
        Comment::factory(320)->create();

        // # 7 - replies
        Reply::factory(510)->create();



        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
