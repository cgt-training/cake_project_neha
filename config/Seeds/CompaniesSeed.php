<?php
use Migrations\AbstractSeed;

/**
 * Companies seed.
 */
class CompaniesSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = ['company_name'=>'CGT',
                    'company_email'=>'info@cgt.co.in',
                    'company_address'=>'6th Chopasani Road, Jodhpur',
                    'company_profile'=>'IT Company',
                    'created'=>'2017-06-14 18:09:01'];

        $table = $this->table('companies');
        $table->insert($data)->save();
    }
}
