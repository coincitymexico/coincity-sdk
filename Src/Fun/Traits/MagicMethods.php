<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Traits;

use Coincity\SDK\Exceptions\VisibilityException;

trait MagicMethods
{
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return $this->toJSON();
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        if (isset($this->{$name})) {
            return true;
        }
        return false;
    }

    /**
     * @param $name
     * @return mixed|null
     * @throws VisibilityException
     */
    public function __get($name)
    {
        foreach ($this->protected as $protected) {
            if ($name == $protected) {
                throw new VisibilityException("This property is protected, so you can't get his value with this method");
            }
        }
        if (isset($this->attributes->{$name})) {
            return $this->attributes->{$name};
        }
        return null;
    }
}