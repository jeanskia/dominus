<?php

namespace Framework\Twig;

/**
 * Description of FormExtension
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class FormExtension extends \Twig_Extension
{
   
    public function getFunctions()
    {
        return [
           new \Twig_SimpleFunction('field', [$this,'field'], ['is_safe'=>['html'],'needs_context'=>true])
           ];
    }
    /**
     * Génère le code HTML d'un champs
     * @param array $context contexte de la vue twig
     * @param string $key clef du camps
     * @param mixed $value valeur du champs
     * @param string $label label à utiliser
     * @param array $options
     * @return type
     */
    public function field(array $context, string $key, $value, string $label = null, array $options = [])
    {  
        $type = $options['type'] ?? 'text';
        $errors = $this->getErrorHtml($context, $key);
        $class = 'form-group ';
        $value = $this->convertValue($value);
        $attributes = [
            'class'=> trim('form-control '.($options['class'] ?? '')),
            'name'=>$key,
            'id'=>$key
        ];
        if ($errors) {
            $class .=' has-danger';
            $attributes['class'] .= ' form-control-danger';
        }
        if ($type ==='textarea') {
            $input = $this->textarea($value, $attributes);
        }elseif ($type ==='password') {
            $input = $this->inputPassword($value, $attributes);
        } 
        elseif (array_key_exists('options', $options)) {
             $input = $this->select($value, $options['options'], $attributes);
        } else {
            $input = $this->input($value, $attributes);
        }
        return "<div class=\"".$class."\">
                    <label for=\"name\">{$label}</label>                    
                        {$input}
                        {$errors}
                </div>";
    }
    
    private function convertValue($value)
    {
        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d H:i:s');
        }
        return $value;
    }


    /**
     * Génère l'HTML en fonction des erreurs du contexte
     * @param type $context
     * @param type $key
     * @return string
     */
    private function getErrorHtml($context, $key)
    {
        $error = $context['errors'][$key] ?? false;
        if ($error) {
            return "<small class=\"form-text alert alert-danger \">{$error}</small> ";
        }
        return "";
    }
    /**
     * Génère un champs <input>
     * @param string $value
     * @param array $attributes
     * @return string
     */
    private function input(string $value = null, array $attributes):string
    {
        return "<input type=\"text\" ".$this->getHtmlFromArray($attributes)." value=\"{$value}\">";
    }
    /**
     * Génère un <textarea>
     * @param type $value
     * @param array $attributes
     * @return string
     */
    private function textarea($value, array $attributes):string
    {
        return "<textarea ".$this->getHtmlFromArray($attributes)." rows=\"3\">{$value}</textarea>";
    }
    /**
     * Génère un <select>
     * @param string $value
     * @param array $options
     * @param array $attributes
     */
    private function select(string $value = null, array $options, array $attributes)
    {
        $htmlOptions = array_reduce(array_keys($options), function (string $html, string $key) use ($options, $value) {
            $params =['value' =>$key,'selected'=>$key === $value ];
            return $html.'<option '.$this->getHtmlFromArray($params).'>'.$options[$key].'</option>';
        }, "");
        return "<select ".$this->getHtmlFromArray($attributes)." >$htmlOptions</select>";
    }
    /**
     * Transforme un tableau $clef=>$valeur en attribut Html
     *
     * @param array $attributes
     * @return type
     */
    private function getHtmlFromArray(array $attributes)
    {
        $htmlParts = [];
        foreach ($attributes as $key => $value) {
            if ($value === true) {
                $htmlParts [] = (string)$key;
            } elseif ($value !== false) {
                $htmlParts [] = "$key =\"$value\"";
            }
        }
        return implode('', $htmlParts);
    }

    private function inputPassword($value, $attributes) 
    {
        return "<input type=\"password\" ".$this->getHtmlFromArray($attributes)." value=\"{$value}\">";
    }

}
