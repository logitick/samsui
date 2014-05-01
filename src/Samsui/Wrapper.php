<?php namespace Samsui;

class Wrapper
{
    protected $properties = array();

    protected $methods = array();

    protected $sequence = 0;

    public function __construct($properties, $methods, $sequence = 0)
    {
        $this->properties = $properties;
        $this->methods = $methods;
        $this->sequence = $sequence;
    }

    public function __sleep()
    {
        return array('properties', 'methods');
    }

    public function __wakeup()
    {
    }

    public function __get($name)
    {
        $value = $this->properties[$name];
        if ($value instanceof \Closure) {
            $value = call_user_func($value, $this->sequence, $this);
        }
        return $value;
    }

    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->properties[$name]);
    }

    public function __unset($name)
    {
        unset($this->properties[$name]);
    }

    public function __call($name, $arguments)
    {
        if (isset($this->methods[$name])) {
            return call_user_func_array($this->methods[$name], $arguments);
        }
        throw new \Exception('Tried to call unknown method in Samsui wrapper object "' . $name . '()"');
    }
}
