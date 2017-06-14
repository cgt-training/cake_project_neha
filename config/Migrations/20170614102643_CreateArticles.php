<?php
use Migrations\AbstractMigration;

class CreateArticles extends AbstractMigration
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
        $table = $this->table('articles');
        $table->addColumn('title','string',['default'=>null,'limit'=>255, 'null'=>false]);
        $table->addColumn('body','text');
        $table->addColumn('created','datetime');
        $table->addColumn('published','enum',['default'=>'0','values' => ['1', '0']]);
        $table->create();


    }
}
