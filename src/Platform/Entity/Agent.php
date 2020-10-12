<?php
namespace App\Platform\Entity;

/**
 * Description of Agent
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class Agent
{
   
    public $id ;
    
    public $name ;
    
    public $first_name;
    
    public $registration;
    
    public $birth_date;
    
    public $service_taked_at;
    
    public $service_name;
    
    public $createdAt;
    
    public $updatedAt;
    
    
    public function setCreatedAt($dateTime)
    {
        if (is_string($dateTime)) {
            $this->createdAt = new \DateTime($dateTime);
        }
    }
}
