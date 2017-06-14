<?php
use Migrations\AbstractMigration;

class CreateBranches extends AbstractMigration
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
        $table = $this->table('branches');

        $table->addColumn('company_id','integer',['default'=>null,'limit'=>11,'null'=>false]);
        $table->addColumn('branch_name','string',['default'=>null,'limit'=>255,'null'=>false]);
        $table->addColumn('created','datetime');
        $table->addColumn('status','enum',
                    [
                        'default'=>'active',
                        'values' => ['active', 'inactive']
                    ]);
        $table->addIndex(['company_id']);
        $table->addForeignKey('company_id', 'companies', 'id');

        $table->create();
    }
}
