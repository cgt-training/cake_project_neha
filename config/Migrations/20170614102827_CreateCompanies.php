<?php
use Migrations\AbstractMigration;

class CreateCompanies extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('companies');

        $table->addColumn('company_name','string',['default'=>null,'limit'=>255, 'null'=>false]);
        $table->addColumn('company_email','string',['default'=>null,'limit'=>255, 'null'=>false]);
        $table->addColumn('company_address','text');
        $table->addColumn('company_profile','text');
        $table->addColumn('created','datetime');
        $table->addColumn('status','enum',
                    [
                        'default'=>'active',
                        'values' => ['active', 'inactive']
                    ]);

        $table->create();
    }
}
