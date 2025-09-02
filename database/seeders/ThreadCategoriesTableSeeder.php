<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThreadCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $ownerByCategory = [
            'Announcements'        => 'admin.it',
            'IT Maintenance'       => 'admin.it',
            'Risk & Compliance'    => 'compliance.lead',
            'Risk Management'      => 'risk.manager',
            'Lending & Credit'     => 'credit.analyst1',
            'Treasury & Markets'   => 'treasury.trader1',
            'Operations'           => 'ops.manager',
            'Customer Service'     => 'cs.jkt01',
            'Marketing & Product'  => 'marketing.lead',
            'Product'              => 'product.manager',
            'Data & Analytics'     => 'data.scientist',
            'Finance & Audit'      => 'finance.manager',
            'Collections'          => 'collections.agent1',
            'Branch Updates'       => 'branch.jkt1',
            'Fraud & AML'          => 'fraud.aml',
        ];

        $usernames = array_values($ownerByCategory);
        $users = DB::table('users')
            ->whereIn('username', $usernames)
            ->get()
            ->keyBy('username');

        $now = now();

        $rows = [];
        foreach ($ownerByCategory as $category => $ownerUsername) {
            $owner = $users[$ownerUsername] ?? null;
            $rows[] = [
                'category'   => $category,                 
                'created_at' => $now,
                'created_by' => $owner?->name ?? 'Seeder', 
                'updated_at' => null,
                'updated_by' => null,
            ];
        }

        DB::table('thread_categories')->insert($rows);
    }
}
