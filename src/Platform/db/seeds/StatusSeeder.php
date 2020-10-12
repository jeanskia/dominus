<?php


use Phinx\Seed\AbstractSeed;

class StatusSeeder extends AbstractSeed
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
        $status = [
            ['name'=>'Contractuel'],
            ['name'=>'fonctionnaire'],
        ];
        
        $data = [];
        foreach ($status as $statu) {
            $data[] = [
                'name'=>$statu['name']
            ];
        }
        $this->table('statuts')
                ->insert($data)
                ->save();
    }
}
