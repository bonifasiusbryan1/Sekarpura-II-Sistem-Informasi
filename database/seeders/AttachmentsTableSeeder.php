<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AttachmentsTableSeeder extends Seeder
{
    public function run(): void
    {
        $events = DB::table('events')
            ->whereBetween('start_time', ['2025-09-01 00:00:00', '2025-09-30 23:59:59'])
            ->get();

        $userNames = DB::table('users')->pluck('name', 'id');

        $now = now();
        $rows = [];

        foreach ($events as $event) {
            $date = Carbon::parse($event->start_time)->format('Ymd');
            $path = "attachments/{$event->id}";
            $createdBy = $event->created_by ?: ($userNames[$event->user_id] ?? 'System');

            $files = [
                "agenda_{$date}.pdf",
                "minutes_{$date}.docx",
            ];
            if ($event->id % 3 === 0) {
                $files[] = "deck_{$date}.pptx";
            }

            Storage::disk('public')->makeDirectory($path);

            foreach ($files as $file) {
                $content = "Dummy file for event #{$event->id} - {$file}";
                Storage::disk('public')->put("{$path}/{$file}", $content);

                $rows[] = [
                    'file'       => $file,
                    'path'       => $path,
                    'created_at' => $now,
                    'created_by' => $createdBy,  
                    'updated_at' => null,
                    'updated_by' => null,
                    'user_id'    => $event->user_id,
                    'events_id'  => $event->id,
                ];
            }
        }

        if (!empty($rows)) {
            DB::table('attachments')->insert($rows);
        }
    }
}
