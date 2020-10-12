<?php
namespace Framework\Router;

/**
 * Description of Route : Represent a matched route
 *
 * @author DJEBRY Ahoba Jean Baptiste <djebryjeanbaptiste@gmail.com>
 * @contact (+225) 09-63-69-53
 */
class Route
{

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var callable
     */
    private $callback;

    /**
     * @var string
     */
    private $name;
    /**
     * route constructeur.
     * @param string $name
     * @param string|callable $callback
     * @param array $parameters
     */
    public function __construct(string $name, $callback, array $parameters)
    {
        $this->name = $name;
        $this->callback = $callback;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    
    /**
     *@return string|callable
     */
    public function getCallback()
    {
        return $this->callback;
    }
    
    /**
     * Retrive the url parameter
     * @return string[]
     */
    public function getParams():array
    {
        return $this->parameters;
    }
}
