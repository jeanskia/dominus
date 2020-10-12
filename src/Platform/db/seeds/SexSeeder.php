<?php


use Phinx\Seed\AbstractSeed;

class SexSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
       
        $data = [
            ['name'=>'homme'],
            [ 'name'=>'femme']
        ];
      
        $services = $this->table('sex')
                         ->insert($data)
                         ->save();
    }
}
