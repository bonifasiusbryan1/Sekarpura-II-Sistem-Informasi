<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Role;
use App\Models\Thread;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            ForumTypesTableSeeder::class,
            ThreadCategoriesTableSeeder::class,
            ThreadsTableSeeder::class,
            EventsTableSeeder::class,
            AttachmentsTableSeeder::class,
        ]);
    }
}
