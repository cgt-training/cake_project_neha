<?php
use Migrations\AbstractMigration;

class CreateComments extends AbstractMigration
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
        $table = $this->table('comments');

        $table->addColumn('comment_text','text');
        $table->addColumn('post_id','integer',['default'=>null,'limit'=>11,'null'=>false]);
        $table->addColumn('user_id','integer',['default'=>null,'limit'=>11,'null'=>false]);
        $table->addColumn('created_date','datetime');
        $table->addColumn('modified_date','datetime');
        //$table->addIndex(['user_id']);
//table->addForeignKey('user_id', 'users', 'id');
        $table->create();
    }
}
