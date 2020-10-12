<?php


use Phinx\Seed\AbstractSeed;

class GradeSeeder extends AbstractSeed
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
        $grades = $this->getGrades();
        $data = [];
        
        foreach ($grades as $grade) {
            $data[] = [
                'name'=>$grade['lib_grade']
            ];
        }
        $this->table('grade')
                ->insert($data)
                ->save();
    }
    
    private function getGrades()
    {
        return [
        ['id_grade' => '1','lib_grade' => 'A5'],
        ['id_grade' => '2','lib_grade' => 'A4'],
        ['id_grade' => '3','lib_grade' => 'A3'],
        ['id_grade' => '4','lib_grade' => 'B3'],
        ['id_grade' => '5','lib_grade' => 'B2'],
        ['id_grade' => '6','lib_grade' => 'A7'],
        ['id_grade' => '7','lib_grade' => 'A6'],
        ['id_grade' => '9','lib_grade' => 'B1'],
        ['id_grade' => '10','lib_grade' => 'C3'],
        ['id_grade' => '11','lib_grade' => 'C2'],
        ['id_grade' => '12','lib_grade' => 'C1'],
        ['id_grade' => '13','lib_grade' => 'D3'],
        ['id_grade' => '14','lib_grade' => 'D2'],
        ['id_grade' => '15','lib_grade' => 'D1'],
        ['id_grade' => '16','lib_grade' => 'N/A']
        ];
    }
}
