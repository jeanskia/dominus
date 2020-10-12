<?php
namespace Framework;

use DateTime;
use Framework\Database\Table;
use Framework\Validator\ValidationError;
use function mb_strlen;
use function self;

/**
 * Description of Validator
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * (+225) 09-63-69-53
 */
class Validator
{
   
    private $params;
    /**
     *tableau d'erreur
     * @var string
     */
    private $errors;


    public function __construct(array $params)
    {
        $this->params = $params;
    }
    /**
     * Vérifie que les champs sont présent dans le tableau
     * @param type $keys
     * @return self
     */
    public function required(string ...$keys):self
    {
        foreach ($keys as $key) {
            $value = $this->getValue($key);
            if (is_null($value)) {
                $this->addErrors($key, 'reqired');
            }
        }
        return $this;
    }
    /**
     * Vérifie que le champs n'est pas vide
     * @param type $keys
     * @return $this
     */
    public function notEmpty(string ...$keys):self
    {
        foreach ($keys as $key) {
            $value = $this->getValue($key);
            if (is_null($value) || empty($value)) {
                $this->addErrors($key, 'empty');
            }
        }
        return $this;
    }
    /**
     * Vérifie la taille de l'élément
     * @param string $key
     * @param int $min
     * @param int $max
     * @return self
     */
    public function length(string $key, int $min, int $max = null):self
    {
        $value = $this->getValue($key);
        $length = mb_strlen($value);
        
        if (!is_null($min) && !is_null($max) && $length<$min || $length>$max) {
            $this->addErrors($key, 'betweenLength', [$min,$max]);
            return $this;
        }
        if (!is_null($min) && $length<$min) {
            $this->addErrors($key, 'minLength', [$min]);
            return $this;
        }
        if (!is_null($max) && $length>$max) {
            $this->addErrors($key, 'maxLength', [$max]);
        }
        return $this;
    }
    /**
     * Vérifie que l'élément est un slug
     */
    public function slug(string $key):self
    {
        $value = $this->getValue($key);
        $pattern = '/^([a-z0-9\-]+-?)$/';
        if (!is_null($value) && !preg_match($pattern, $value)) {
            $this->addErrors($key, 'slug');
        }
        return $this;
    }
    /**
     * Vérifie si l'email est valide
     */
    public function validEmail(string $key):self
    {
        $value = $this->getValue($key);
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addErrors($key, 'email');
        }
        return $this;
    }
    /**
     * Vérifie que l'élément est de type DateTime
     * @param string $key
     * @param string $format
     * @return self
     */
    public function dateTime(string $key, string $format = 'Y-m-d H:i:s'):self
    {
        $value = $this->getValue($key);
        $date = DateTime::createFromFormat($format, $value);
        $errors = DateTime::getLastErrors();
        if ($errors['error_count'] > 0 || $errors['warning_count'] > 0 || $date === false) {
            $this->addErrors($key, 'dateTime', [$format]);
        }
        return this;
    }
    /**
     * Vérifie que la clé existe dans la table en BDD
     *
     * @param type $id
     * @param Table $table
     * @return type
     */
    public function exists(string $key, string $table, \PDO $pdo):self
    {
        $id = $this->getValue($key);
        $statement = $pdo->prepare("SELECT id FROM $table WHERE id = ?");
        $statement->execute([$id]);
        if ($statement->fetchColumn()=== false) {
            $this->addErrors($key, 'exists', [$table]);
        }
        return $this;
    }

    /**
     * récupère les erreurs
     * @return ValidationError
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    
    public function isValide(): bool
    {
        return empty($this->errors);
    }

        /**
     * Ajoute une erreur
     * @param string $key
     * @param string $rule
     * @param array $attributes
     */
    private function addErrors(string $key, string $rule, array $attributes = [])
    {
        $this->errors[$key] = new ValidationError($key, $rule, $attributes);
    }
    /**
     * Récupère la valeur de clé
     * @param string $key
     * @return type
     */
    private function getValue(string $key)
    {
        if (array_key_exists($key, $this->params)) {
            return $this->params[$key];
        }
        return null;
    }
}
