<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $now = now()->toDateTimeString();
        $password = Hash::make('rahasia123');
        $users = [
            ['username' => 'admin.it', 'name' => 'Aldi Pratama', 'email' => 'aldi.pratama@midbank.co.id', 'nip' => '1988111100010001', 'unit' => 'IT Security', 'role' => 3, 'bio' => 'IT Security Lead'],
            ['username' => 'compliance.lead', 'name' => 'Dina Siregar', 'email' => 'dina.siregar@midbank.co.id', 'nip' => '1989020200020002', 'unit' => 'Compliance', 'role' => 2, 'bio' => 'Head of Compliance'],
            ['username' => 'risk.manager', 'name' => 'Bayu Wirawan', 'email' => 'bayu.wirawan@midbank.co.id', 'nip' => '1987030300030003', 'unit' => 'Risk Management', 'role' => 2, 'bio' => 'Risk Manager'],

            ['username' => 'branch.jkt1', 'name' => 'Siti Kurnia', 'email' => 'siti.kurnia@midbank.co.id', 'nip' => '1990010100040004', 'unit' => 'Retail Banking', 'role' => 2, 'bio' => 'Branch Manager Jakarta 1'],
            ['username' => 'teller.jkt01', 'name' => 'Rahmat Hidayat', 'email' => 'rahmat.hidayat@midbank.co.id', 'nip' => '1992020200050005', 'unit' => 'Operations', 'role' => 1, 'bio' => 'Teller (JKT-01)'],
            ['username' => 'cs.jkt01', 'name' => 'Maya Aprilianti', 'email' => 'maya.aprilianti@midbank.co.id', 'nip' => '1993030300060006', 'unit' => 'Customer Service', 'role' => 1, 'bio' => 'Customer Service Rep'],

            ['username' => 'loan.officer1', 'name' => 'Fajar Nugroho', 'email' => 'fajar.nugroho@midbank.co.id', 'nip' => '1994040400070007', 'unit' => 'Lending', 'role' => 2, 'bio' => 'Loan Officer'],
            ['username' => 'credit.analyst1', 'name' => 'Putri Andini', 'email' => 'putri.andini@midbank.co.id', 'nip' => '1995050500080008', 'unit' => 'Credit', 'role' => 2, 'bio' => 'Credit Analyst'],

            ['username' => 'finance.manager', 'name' => 'Rudi Hartono', 'email' => 'rudi.hartono@midbank.co.id', 'nip' => '1986060600090009', 'unit' => 'Finance', 'role' => 2, 'bio' => 'Finance Manager'],
            ['username' => 'auditor.internal', 'name' => 'Kristina Tampubolon', 'email' => 'kristina.tampubolon@midbank.co.id', 'nip' => '1987070700100010', 'unit' => 'Audit', 'role' => 2, 'bio' => 'Internal Auditor'],

            ['username' => 'fraud.aml', 'name' => 'Agus Pranata', 'email' => 'agus.pranata@midbank.co.id', 'nip' => '1996060600110011', 'unit' => 'Fraud & AML', 'role' => 2, 'bio' => 'Fraud Investigator'],
            ['username' => 'risk.analyst1', 'name' => 'Fiona Widjaja', 'email' => 'fiona.widjaja@midbank.co.id', 'nip' => '1997070700120012', 'unit' => 'Risk Management', 'role' => 2, 'bio' => 'Risk Analyst'],

            ['username' => 'treasury.trader1', 'name' => 'William Santoso', 'email' => 'william.santoso@midbank.co.id', 'nip' => '1998080800130013', 'unit' => 'Treasury', 'role' => 2, 'bio' => 'FX Trader'],

            ['username' => 'marketing.lead', 'name' => 'Raisa Utami', 'email' => 'raisa.utami@midbank.co.id', 'nip' => '1999090900140014', 'unit' => 'Marketing', 'role' => 2, 'bio' => 'Marketing Lead'],
            ['username' => 'product.manager', 'name' => 'Jonathan Halim', 'email' => 'jonathan.halim@midbank.co.id', 'nip' => '1990101000150015', 'unit' => 'Product', 'role' => 2, 'bio' => 'Product Manager'],
            ['username' => 'data.scientist', 'name' => 'Nabila Putri', 'email' => 'nabila.putri@midbank.co.id', 'nip' => '1991111100160016', 'unit' => 'Data & Analytics', 'role' => 2, 'bio' => 'Data Scientist'],

            ['username' => 'ops.manager', 'name' => 'Hendri Kurniawan', 'email' => 'hendri.kurniawan@midbank.co.id', 'nip' => '1992121200170017', 'unit' => 'Operations', 'role' => 2, 'bio' => 'Operations Manager'],
            ['username' => 'collections.agent1', 'name' => 'Taufik Hidayat', 'email' => 'taufik.hidayat@midbank.co.id', 'nip' => '1993131300180018', 'unit' => 'Collections', 'role' => 1, 'bio' => 'Collections Agent'],
        ];

        $rows = array_map(function ($u) use ($password, $now) {
            return array_merge([
                'password' => $password,
                'image' => null,
                'remember_token' => Str::random(60),
                'is_ldap' => false,           
                'created_at' => $now,
                'updated_at' => $now,
            ], $u);
        }, $users);

        DB::table('users')->insert($rows);
    }
}
