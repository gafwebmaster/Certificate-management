<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;


class CertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('certificates')->insert([
            'expiry_date'=> now()->addDays(),
            'certificate_type'=> Str::random(10),
            'pci_owner'=> Str::random(10),
            'certificate_name'=> Str::random(10),
            'equipment'=> Str::random(10),
            'provider'=> Str::random(10),
            'contact_name'=> Str::random(10),
            'contact_phone'=> Str::random(10),
            'email_contact'=> Str::random(10)."@gmail.com",
            'generated_by'=> Str::random(10),
            'about_certificate'=> Str::random(10),
            'remarks'=> Str::random(10),
        ]);
    }
}
