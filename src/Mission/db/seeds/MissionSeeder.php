<?php

use Phinx\Seed\AbstractSeed;

class MissionSeeder extends AbstractSeed
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
        $data = [];
        $faker = Faker\Factory::create('fr_FR');
        for ($i=1; $i<300; $i++) {
            $date = $faker->unixTime('now');
            $data[] = [
                'name'=>$faker->catchPhrase,
                'slug'=>$faker->slug,
                'location'=>$faker->city,
                'created_at'=>date('Y-m-d H:i:s', $date),
                'start_mission'=>date('Y-m-d H:i:s', $date),
                'end_mission'=> date('Y-m-d H:i:s', $date)
            ];
        }
         $this->table('mission')
                ->insert($data)
                ->save();
    }
}
