<?php
namespace Framework\Validator;

/**
 * Description of ValidationError
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class ValidationError
{

    /**
     * @var string
     */
    private $rule;

    /**
     * @var string
     */
    private $key;

    /**
     * @var array
     */
    private $attributes;
  
    private $message = [
        'required'=>'Le champ est requis !',
        'empty'=>'Le champ ne peut être vide !',
        'slug'=>'Le champ n\'est pas un slug !',
        'email'=>'entrer une adresse email valide !',
        'minLength'=>'Le champ doit contenir plus de %d caractère !',
        'maxLength'=>'Le champ doit contenir moin de %d caractère !',
        'betweenLength'=>'Le champ doit contenir entre %d et %d caractère!',
        'dateTime'=>'Le champ doit être une date valide  !',
        'exists'=>'Le champ n\'existe pas !'
        ];

    public function __construct(string $key, string $rule, array $attributes = [])
    {
       
        $this->attributes = $attributes;
        $this->key = $key;
        $this->rule = $rule;
    }
    
    public function __toString()
    {
        $params = array_merge([$this->message[$this->rule]], $this->attributes);
        return (string) call_user_func_array('sprintf', $params);
    }
}
