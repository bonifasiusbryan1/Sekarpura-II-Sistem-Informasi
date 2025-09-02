<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserForumTypesTableSeeder extends Seeder
{
    public function run(): void
    {
        $types = DB::table('forum_types')->pluck('id', 'type'); 

        $usernames = [
            'admin.it',
            'compliance.lead',
            'risk.manager',
            'branch.jkt1',
            'teller.jkt01',
            'cs.jkt01',
            'loan.officer1',
            'credit.analyst1',
            'finance.manager',
            'auditor.internal',
            'fraud.aml',
            'risk.analyst1',
            'treasury.trader1',
            'marketing.lead',
            'product.manager',
            'data.scientist',
            'ops.manager',
            'collections.agent1',
        ];
        $users = DB::table('users')->whereIn('username', $usernames)->pluck('id', 'username');

        $rows = [];
        foreach ($users as $uname => $uid) {
            $rows[] = ['user_id' => $uid, 'forum_type_id' => $types['internal']];
        }

        $externalAllowed = [
            'marketing.lead',
            'product.manager',
            'treasury.trader1',
            'cs.jkt01',
            'branch.jkt1'
        ];
        foreach ($externalAllowed as $uname) {
            if (isset($users[$uname]) && isset($types['external'])) {
                $rows[] = ['user_id' => $users[$uname], 'forum_type_id' => $types['external']];
            }
        }

        DB::table('user_forum_types')->insert($rows);
    }
}
