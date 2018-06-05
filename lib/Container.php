<?php

/**
 * einfacher Dependency Injection Container für Klassen und Parameter
 *
 * Class DIContainer
 */
class Container
{
    /**
	 * gespeicherte Objekte
	 *
     * @var array map storage of dependencies
	 */
     private $dependency = array();

    /**
     * Registers on dependency in the container
     * Creates an array with $value and optional $args, matches with the $key end stores
	 *
	 * @param $classNameAlias
	 * @param $className
	 * @param bool $flagContainer
	 */
    public function add($classNameAlias, $className, $flagContainer = false)
    {
    	$this->dependency[$classNameAlias]['class'] = $className;
		$this->dependency[$classNameAlias]['flagContainer'] = $flagContainer;

		return;
    }

    /**
     * Gibt ein Objekt zurück
	 *
	 * @param $classNameAlias
	 *
	 * @return mixed
	 * @throws \Exception
	 */
    public function get($classNameAlias)
    {
        // Check if the key exist and throw Exception
        if(!array_key_exists($classNameAlias, $this->dependency))
        {
            throw new Exception("DIContainer, object: '".$classNameAlias."' doesn't exist in the container.");
        }
		// get class from $dependency array and build object
        else
        {
			$class = $this->dependency[$classNameAlias]['class'];

        	if($this->dependency[$classNameAlias]['flagContainer'] == true){
				$myClass = new $class($this);
			}
			else{
				$myClass = new $class();
			}
        }

		return $myClass;
    }

    /**
     * Gibt die Parameter zurück
	 *
	 * @param $paramName
	 *
	 * @return array of params
	 * @throws \Exception
	 */
    public function getParams($paramName)
    {
    	if(!array_key_exists($paramName, $this->dependency))
    	{
    		throw new Exception("DIContainer, params: '".$paramName."' doesn't exist in the container.");
		}

        return $this->dependency[$paramName];
    }

    /**
     * fügt Parameter hinzu
	 *
	 * @param $paramName
	 * @param $params
	 */
    public function addParams($paramName, $params)
    {
        $this->dependency[$paramName] = $params;

        return;
    }
}
