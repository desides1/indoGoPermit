<?php

namespace Database\Seeders;

use App\Models\RequestNumber;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class requestNumberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numbers = [
            ['number' => '001 - Perizinan SPNF'],
            ['number' => '002 - Perizinan PAUD'],
            ['number' => '003 - Perizinan SD'],
            ['number' => '004 - Perizinan SMP'],
            ['number' => '005 - Perizinan Laboratorium Kesehatan Masyarakat'],
            ['number' => '006 - Perizinan IPPT'],
            ['number' => '007 - Perizinan KKKPR'],
            ['number' => '008 - Perizinan LIMB'],
            ['number' => '009 - Perizinan NonFormal'],

        ];
        foreach ($numbers as $number) {
            // PermitType::factory()->create($permit);
            RequestNumber::create($number);
        }
    }
}
