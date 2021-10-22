<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Traits\Models;
trait Magic
{
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->attributes->{$name} = $value;
    }

    /**
     * @param $name
     * @return null
     */
    public function __get($name)
    {
        if (isset($this->attributes->{$name})) {
            return $this->attributes->{$name};
        }
        return null;
    }

    /**
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this->attributes);
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name)
    {
        if (isset($this->attributes->{$name})) {
            return true;
        }
        return false;
    }
}