<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ThreadsTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $typeMap = DB::table('forum_types')->pluck('id', 'type'); 
        $internalId = $typeMap['internal'] ?? 1;
        $externalId = $typeMap['external'] ?? 2;

        $categories = [
            'IT Maintenance',
            'Risk & Compliance',
            'Operations',
            'Data & Analytics',
            'Treasury & Markets',
        ];
        $catIds = DB::table('thread_categories')->whereIn('category', $categories)->pluck('id', 'category');

        $users = DB::table('users')->get()->keyBy('username'); 
        $userIdToName = $users->pluck('name', 'id');

        $pivot = DB::table('user_forum_types')->get();
        $allowedByUserId = [];
        foreach ($pivot as $p) {
            $allowedByUserId[$p->user_id] = $allowedByUserId[$p->user_id] ?? [];
            $allowedByUserId[$p->user_id][] = $p->forum_type_id;
        }
        
        foreach ($users as $u) {
            if (!isset($allowedByUserId[$u->id]) || empty($allowedByUserId[$u->id])) {
                if ((int)$u->role >= 2) {
                    $allowedByUserId[$u->id] = [$internalId, $externalId];
                } else {
                    $allowedByUserId[$u->id] = [$internalId];
                }
            }
        }

        $authorsByCategory = [
            'IT Maintenance'       => ['admin.it'],
            'Risk & Compliance'    => ['compliance.lead', 'risk.manager'],
            'Operations'           => ['ops.manager', 'branch.jkt1'],
            'Data & Analytics'     => ['data.scientist'],
            'Treasury & Markets'   => ['treasury.trader1'],
        ];

        $findAuthor = function (array $candidates, int $needTypeId) use ($users, $allowedByUserId) {
            foreach ($candidates as $uname) {
                $u = $users[$uname] ?? null;
                if ($u && in_array($needTypeId, $allowedByUserId[$u->id] ?? [], true)) {
                    return $u;
                }
            }
            foreach ($users as $u) {
                if (in_array($needTypeId, $allowedByUserId[$u->id] ?? [], true)) return $u;
            }
            return null;
        };

        $pickPendingType = function ($u) use ($allowedByUserId, $internalId, $externalId) {
            $allowed = $allowedByUserId[$u->id] ?? [];
            if (in_array($internalId, $allowed, true)) return $internalId;
            if (in_array($externalId, $allowed, true)) return $externalId;
            return $internalId;
        };

        $rows = [];

        $content = [
            'IT Maintenance' => [
                "We plan to apply the monthly security patch bundle to the core banking platform during a controlled maintenance window. The change has a verified rollback plan, a read-only data checkpoint, and a step-by-step smoke test that covers login, account overview, and fund transfer. All affected services will be drained gracefully, then brought back in waves to limit user impact. Owners must remain on the war room bridge and post verification screenshots within fifteen minutes after each wave.",
                "This service advisory summarizes a planned update that improves performance and closes recently disclosed vulnerabilities. Customer-facing channels are expected to remain available, but brief reconnections may occur as network nodes fail over. We will monitor latency and error rates in real time and coordinate with our partners to keep experience consistent. If you notice unusual behavior, please try again after a moment or contact our support team for assistance.",
                "We propose a targeted hardening rollout for employee laptops that enforces stronger endpoint policies without interrupting daily work. The pilot shows stable CPU usage, no conflicts with teller software, and a measurable drop in malware detections. Change notes and self-help guides are prepared, and a two-week feedback window is planned. Final approval is pending the last legal and procurement checks on third-party modules."
            ],
            'Risk & Compliance' => [
                "A new eKYC guideline requires clearer audit trails, more consistent document capture, and tighter exception handling. Our plan introduces guided steps in branch, an updated checklist for reviewers, and automated reminders for incomplete cases. We will publish a concise playbook and run short training sessions with branch teams. Compliance will track weekly progress and escalate gaps to the risk committee until closure.",
                "We are updating public disclosures and customer notices to reflect the latest regulatory expectations around identity verification and politically exposed person screening. The legal team has provided language that is easier to understand while preserving the necessary legal precision. We will roll the content to digital channels first, then branch materials. External partners are informed and timelines are aligned to avoid inconsistencies.",
                "The KYC refresh campaign for existing customers will prioritize higher-risk segments and high-balance accounts. Messaging is phased, starting with soft reminders and moving to stronger prompts where required by regulation. We will report completion rates, turnaround times, and any exceptions that need case-by-case review. Launch is pending the final approval of the communication kit and FAQ."
            ],
            'Operations' => [
                "The branch queue pilot focuses on cutting average wait time and balancing counter load. We will refine the ticket categories, tune priority rules for elderly and disabled customers, and place clearer guidance signage. Daily dashboards will compare service times across hours and staff assignments. Lessons learned from the pilot will be converted into a standard operating procedure for broader rollout.",
                "To improve ATM uptime, we are adjusting replenishment schedules, introducing preventive maintenance before peak periods, and replacing recurrently failing components. Technicians will receive a simplified checklist to speed up on-site visits and capture serial-level failure data. We expect a gradual increase in availability and will publish weekly reports to maintain transparency.",
                "The SLA dashboard rollout aggregates ticket resolution times, reconciliation cut-offs, and branch service metrics into a single view. Department heads will receive access with filters by region and week. We will collect feedback on layout and KPIs for two weeks and iterate quickly. Launch timing depends on final data quality checks and sign-offs from system owners."
            ],
            'Data & Analytics' => [
                "We tuned fraud model thresholds and refreshed features using the last ninety days of transactions. Back-testing shows a clear lift in recall with a modest increase in false positives that operations can absorb. We added monitoring on data drift, precision at critical thresholds, and investigation backlog to keep performance in balance after go-live.",
                "An enterprise data catalog will document key datasets, business definitions, and data owners to make discovery easier and strengthen compliance. Initial metadata has been harvested from core systems, and tags for sensitivity and retention are being reviewed. We will publish a starter collection and expand iteratively with the help of each domain team.",
                "We propose a lightweight model monitoring framework that tracks stability of input features, changes in score distributions, and live outcome signals. Alerts will route to a shared channel with runbooks for rapid triage. The framework is designed to be simple to operate and extend as use cases grow."
            ],
            'Treasury & Markets' => [
                "We refreshed FX position guidelines to reflect current volatility and liquidity conditions. Intraday exposure limits are tightened, escalation paths are clarified, and the end-of-day report template has been standardized. The objective is to keep risk within appetite while allowing traders enough flexibility to execute strategy efficiently.",
                "A liquidity stress drill will simulate a sudden outflow and test contingency funding sources. The exercise includes stress parameters, a communication plan, and validation of reporting timelines. Results will be reviewed with risk management and used to fine-tune the playbook for real events.",
                "We plan to update market risk limits and align them with revised macro assumptions. Proposed limits are backed by historical scenarios and sensitivity analysis. Finalization depends on committee review and sign-off from senior management."
            ],
        ];

        foreach ($categories as $cat) {
            $catId = $catIds[$cat] ?? null;
            if (!$catId) continue;

            $candidates = $authorsByCategory[$cat] ?? [];
            if (empty($candidates)) continue;

            $authorA = $findAuthor($candidates, $internalId);
            if ($authorA) {
                $rows[] = [
                    'title'              => Str::limit(match ($cat) {
                        'IT Maintenance'       => 'Core Banking Patch Schedule',
                        'Risk & Compliance'    => 'Regulatory eKYC Update',
                        'Operations'           => 'Branch Queue Pilot Review',
                        'Data & Analytics'     => 'Fraud Model Threshold Tuning',
                        'Treasury & Markets'   => 'FX Position Guideline',
                        default                => 'Internal Update',
                    }, 30, ''),
                    'content'            => $content[$cat][0],
                    'file'               => null,
                    'status'             => 'approved',
                    'created_at'         => $now,
                    'created_by'         => $authorA->name,
                    'updated_at'         => null,
                    'updated_by'         => null,
                    'user_id'            => $authorA->id,
                    'forum_type_id'      => $internalId,
                    'thread_category_id' => $catId,
                ];
            }

            $authorB = $findAuthor($candidates, $externalId);
            if ($authorB) {
                $rows[] = [
                    'title'              => Str::limit(match ($cat) {
                        'IT Maintenance'       => 'Endpoint Hardening Rollout',
                        'Risk & Compliance'    => 'KYC Refresh Program Plan',
                        'Operations'           => 'ATM Uptime Improvement',
                        'Data & Analytics'     => 'Enterprise Data Catalog Plan',
                        'Treasury & Markets'   => 'Liquidity Stress Test Drill',
                        default                => 'External Advisory',
                    }, 30, ''),
                    'content'            => $content[$cat][1],
                    'file'               => null,
                    'status'             => 'approved',
                    'created_at'         => $now,
                    'created_by'         => $authorB->name,
                    'updated_at'         => null,
                    'updated_by'         => null,
                    'user_id'            => $authorB->id,
                    'forum_type_id'      => $externalId,
                    'thread_category_id' => $catId,
                ];
            }

            $authorC = $findAuthor($candidates, $internalId) ?: $findAuthor($candidates, $externalId);
            if ($authorC) {
                $typeC = $pickPendingType($authorC);
                $rows[] = [
                    'title'              => Str::limit(match ($cat) {
                        'IT Maintenance'       => 'Network Change Advisory',
                        'Risk & Compliance'    => 'Internal Control Enhancements',
                        'Operations'           => 'SLA Dashboard Rollout',
                        'Data & Analytics'     => 'Model Monitoring and Drift',
                        'Treasury & Markets'   => 'Market Risk Limit Update',
                        default                => 'Pending Proposal',
                    }, 30, ''),
                    'content'            => $content[$cat][2],
                    'file'               => null,
                    'status'             => 'pending',
                    'created_at'         => $now,
                    'created_by'         => $authorC->name,
                    'updated_at'         => null,
                    'updated_by'         => null,
                    'user_id'            => $authorC->id,
                    'forum_type_id'      => $typeC,
                    'thread_category_id' => $catId,
                ];
            }
        }

        if (!empty($rows)) {
            DB::table('threads')->insert($rows);
        }
    }
}