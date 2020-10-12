<?php


use Phinx\Seed\AbstractSeed;

class MaritalStatusSeeder extends AbstractSeed
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
            ['name'=>'célibataire'],
            [ 'name'=>'marié(e)']
        ];
      
        $services = $this->table('maritalstatus')
                         ->insert($data)
                         ->save();
    }
}
