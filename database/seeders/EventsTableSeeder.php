<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventsTableSeeder extends Seeder
{
    public function run(): void
    {
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

        $users = DB::table('users')
            ->whereIn('username', $usernames)
            ->get()
            ->keyBy('username');

        $now = now();

        $plan = [
            ['admin.it',         'IT Patch Window',         '2025-09-01 19:00:00', '2025-09-01 21:00:00', 'Security patching window'],
            ['branch.jkt1',      'Retail Morning Brief',    '2025-09-01 08:30:00', '2025-09-01 09:00:00', 'Morning brief'],

            ['compliance.lead',  'Compliance Weekly Sync',  '2025-09-02 09:00:00', '2025-09-02 10:30:00', 'Reg update & open issues'],
            ['marketing.lead',   'Branch Sales Clinic',     '2025-09-02 16:00:00', '2025-09-02 17:00:00', 'Sales push & tips'],
            ['teller.jkt01',     'Teller Refresher',        '2025-09-02 11:00:00', '2025-09-02 12:00:00', 'Refresher for cash ops'],
            ['cs.jkt01',         'CS Quality Review',       '2025-09-02 15:00:00', '2025-09-02 16:00:00', 'QA tickets & feedback'],

            ['risk.manager',     'Risk Committee',          '2025-09-03 14:00:00', '2025-09-03 16:00:00', 'Portfolio review Q3'],
            ['ops.manager',      'Daily Ops Standup',       '2025-09-03 09:00:00', '2025-09-03 09:30:00', 'Daily ops risk & blockers'],

            ['treasury.trader1', 'Treasury Desk Briefing',  '2025-09-04 10:00:00', '2025-09-04 11:30:00', 'Desk updates & risk levels'],
            ['treasury.trader1', 'FX Strategy Huddle',      '2025-09-04 16:30:00', '2025-09-04 17:00:00', 'Hedge & exposure update'],

            ['branch.jkt1',      'Branch JKT1 Huddle',      '2025-09-05 09:00:00', '2025-09-05 10:00:00', 'Ops & sales alignment'],
            ['credit.analyst1',  'Credit Committee',        '2025-09-05 10:30:00', '2025-09-05 12:00:00', 'New apps & NPL watchlist'],
            ['marketing.lead',   'Marketing Weekly',        '2025-09-05 15:00:00', '2025-09-05 16:00:00', 'Channel perf & next steps'],

            ['collections.agent1', 'Collections Call Blitz', '2025-09-06 13:00:00', '2025-09-06 15:00:00', 'Target 50 calls; focus 30+ DPD'],
            ['admin.it',         'DR Readiness Check',      '2025-09-06 10:00:00', '2025-09-06 11:00:00', 'DR readiness quick check'],

            ['admin.it',         'Core Patch Window',       '2025-09-07 20:00:00', '2025-09-07 22:00:00', 'Core patching window'],

            ['admin.it',         'IT DR Drill',             '2025-09-08 09:00:00', '2025-09-08 10:30:00', 'Data center failover test'],
            ['auditor.internal', 'Audit Planning',          '2025-09-09 14:00:00', '2025-09-09 15:00:00', 'Scope, timeline, sampling'],
            ['marketing.lead',   'Campaign Kickoff',        '2025-09-10 10:00:00', '2025-09-10 11:30:00', 'Q4 launch plan & channels'],
            ['product.manager',  'Roadmap Review',          '2025-09-11 15:00:00', '2025-09-11 16:00:00', 'Q4 features & dependencies'],
            ['loan.officer1',    'Loan Approval Clinic',    '2025-09-12 09:00:00', '2025-09-12 11:00:00', 'SME & mortgage pipeline'],

            ['cs.jkt01',         'Customer Care Training',  '2025-09-15 09:30:00', '2025-09-15 10:30:00', 'Handling escalations'],
            ['marketing.lead',   'Marketing Standup',       '2025-09-15 11:30:00', '2025-09-15 12:00:00', 'Daily channel update'],
            ['auditor.internal', 'Branch Service Audit',    '2025-09-15 14:00:00', '2025-09-15 15:00:00', 'Branch process sampling'],

            ['fraud.aml',        'Fraud/AML Case Review',   '2025-09-16 15:00:00', '2025-09-16 16:30:00', 'Cards & e-banking anomalies'],
            ['credit.analyst1',  'Credit Quality Check',    '2025-09-16 10:00:00', '2025-09-16 11:00:00', 'Portfolio sample review'],
            ['fraud.aml',        'AML Alert Triage',        '2025-09-16 11:30:00', '2025-09-16 12:00:00', 'Triage of new alerts'],

            ['data.scientist',   'Data Sprint Planning',    '2025-09-17 10:00:00', '2025-09-17 12:00:00', 'Use cases & backlog'],
            ['risk.analyst1',    'Data Model Review',       '2025-09-17 14:00:00', '2025-09-17 15:00:00', 'Scorecards & features'],

            ['ops.manager',      'Ops SLA Review',          '2025-09-18 09:00:00', '2025-09-18 10:00:00', 'Weekly ops KPI review'],
            ['ops.manager',      'Ops Vendor Sync',         '2025-09-18 11:00:00', '2025-09-18 12:00:00', 'Vendor tickets & SLA'],

            ['finance.manager',  'Finance Close Prep',      '2025-09-19 13:00:00', '2025-09-19 14:30:00', 'Accruals & schedules'],
            ['finance.manager',  'Finance P&L Flash',       '2025-09-19 10:00:00', '2025-09-19 10:30:00', 'Flash P&L review'],

            ['admin.it',         'ATM Network Maintenance', '2025-09-20 21:00:00', '2025-09-20 23:00:00', 'Late-night ATM patching'],
            ['admin.it',         'DR Site Health Check',    '2025-09-21 20:00:00', '2025-09-21 21:00:00', 'DR site routine check'],

            ['risk.analyst1',    'Risk Model Check-in',     '2025-09-23 09:00:00', '2025-09-23 10:00:00', 'PD/LGD monitoring'],
            ['treasury.trader1', 'FX Market Wrap',          '2025-09-25 16:00:00', '2025-09-25 17:00:00', 'Week recap & positions'],
            ['branch.jkt1',      'Branch KPI Review',       '2025-09-26 09:00:00', '2025-09-26 10:00:00', 'Targets & service issues'],
            ['admin.it',         'Quarter-End Readiness',   '2025-09-29 14:00:00', '2025-09-29 15:30:00', 'Cutover checklist'],
        ];

        $rows = [];
        foreach ($plan as [$uname, $title, $start, $end, $desc]) {
            $u = $users[$uname] ?? null;
            if (!$u) {
                continue;
            }
            $rows[] = [
                'title'       => $title,
                'description' => $desc,
                'start_time'  => $start,
                'end_time'    => $end,
                'created_at'  => $now,             
                'created_by'  => $u->name,         
                'updated_at'  => null,
                'updated_by'  => null,
                'user_id'     => $u->id,
            ];
        }

        DB::table('events')->insert($rows);
    }
}