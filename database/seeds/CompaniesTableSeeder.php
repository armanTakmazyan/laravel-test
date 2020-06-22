<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name' => 'someName',
                'email' => 'someEmail@.com',
                'website' => 'somewebsite.com'
            ],[
                'name' => 'someName2',
                'email' => 'someEmail2@.com',
                'website' => 'somewebsite2.com',
            ]
        ];

        foreach ($companies as $company) {
            Company::updateOrcreate([
                'name' => $company['name'],
                'email' => $company['email'],
                'website' => $company['website']
            ],[
                'name' => $company['name'],
                'email' => $company['email'],
                'website' => $company['website']
            ]);
        }
    }
}
