<?php
use Migrations\AbstractSeed;

/**
 * Articles seed.
 */
class ArticlesSeed extends AbstractSeed
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
        $data = ['title'=>'test',
                    'body'=>'test kfhgjkhdfgldj g hdhfgjhg',
                    'created'=>'2017-06-14 18:09:01'];

        $table = $this->table('articles');
        $table->insert($data)->save();
    }
}
