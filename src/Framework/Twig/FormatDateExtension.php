<?php

namespace Framework\Twig;

use DateTime;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Description of FormatDateExtension
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class FormatDateExtension extends Twig_Extension
{
    
    public function getFunctions()
    {
      
        return[
            new Twig_SimpleFunction('month', [$this,'getCurrentMonth'], ['is_safe'=>['html']])
        ];
    }
    /**
     * renvoie le mois et l'année en cours
     * @return string
     */
    public function getCurrentMonth()
    {
        $date = (new DateTime())->format("Y-m-d");
        $date = explode('-', $date);
        return $this->retreiveMonth($date[1]).'-'.$date[0];
    }
    
    private function retreiveMonth($key)
    {
        $Mois = ["01"=>"Janvier","02"=> "Février","03"=>"Mars","04"=> "Avril","05"=>"Mai","06"=>"Juin",
               "07"=>"Juillet","08"=>"Août","09"=>"Septembre","10"=>"Octobre","11"=>"Novembre","12"=>"Décembre"];
        if (array_key_exists($key, $Mois)) {
            return $Mois[$key];
        }
    }
}
