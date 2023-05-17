<?php

namespace Database\Seeders;

use App\Models\ReportMember;
use Illuminate\Database\Seeder;

class ReportMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return ReportMember::factory(5)->create();
    }
}
