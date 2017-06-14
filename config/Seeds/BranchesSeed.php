<?php
use Migrations\AbstractSeed;

/**
 * Branches seed.
 */
class BranchesSeed extends AbstractSeed
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
        $data[0] = ['company_id'=>2,
                    'branch_name'=>'CGT Jodhpur',
                    'created'=>'2017-06-14 18:09:01'];
        $data[1] = ['company_id'=>2,
                    'branch_name'=>'CGT Jaipur',
                    'created'=>'2017-06-14 18:11:01'];

        $table = $this->table('branches');
        $table->insert($data)->save();
    }
}
