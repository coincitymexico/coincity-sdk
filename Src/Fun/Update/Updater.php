<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Update;

use Coincity\SDK\Exceptions\VisibilityException;
use Coincity\SDK\Interfaces\IUpdater;
use Danidoble\Danidoble;

class Updater implements IUpdater
{
    protected Danidoble $original;
    protected Danidoble $attributes;
    protected Danidoble $to_update;
    protected string $class_to_update;

    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->attributes->{$name} = $value;
    }

    /**
     * @throws VisibilityException
     */
    public function __get($name)
    {
        if ($name === "original") {
            throw new VisibilityException("This property can not modify or show");
        }
        if (isset($this->attributes->{$name})) {
            return $this->attributes->{$name};
        }
        return null;
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

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJSON();
    }

    /**
     * @param $data
     * @param $names
     * @param $class_name
     */
    public function __construct($data, $names, $class_name)
    {
        $this->class_to_update = $class_name;
        $this->to_update = new Danidoble();
        $arr_values = array_values($names);
        $arr_keys = array_keys($names);
        $this->original = new Danidoble();
        $this->attributes = new Danidoble();
        foreach ($data as $key => $value) {
            $_name__ = null;
            foreach ($arr_values as $k => $ori_val) {
                if ($ori_val == $key) {
                    $_name__ = $arr_keys[$k];
                    break;
                }
            }

            if ($_name__ !== null) {
                $this->attributes->{$_name__} = $value;
                $this->original->{$_name__} = $value;
            } else {
                $this->attributes->{$key} = $value;
                $this->original->{$key} = $value;
            }
        }
    }

    /**
     * @return Danidoble
     */
    public function toDanidoble(): Danidoble
    {
        $dd = new Danidoble();
        foreach ($this->toArray() as $key => $value) {
            $dd->{$key} = $value;
        }
        return $dd;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return json_decode(json_encode($this->attributes), true);
    }

    /**
     * @return string
     */
    public function toJSON(): string
    {
        return json_encode($this->attributes);
    }

    /**
     * Verify if this has changes to save
     */
    private function verifyChanges()
    {
        $r = new Danidoble();
        foreach ($this->attributes as $key => $attribute) {
            if (isset($this->original->{$key}) && $this->original->{$key} !== $this->attributes->{$key}) {
                $r->{$key} = $attribute;
            }
        }

        $this->to_update = $r;
    }

    /**
     * @return Updater|mixed
     */
    public function save()
    {
        $this->verifyChanges();
        if ($this->to_update->count() > 0) {
            $update = new $this->class_to_update;
            $update->attributes->setId($this->id);
            foreach ($this->to_update->toArray() as $to_update_key => $to_update_value) {
                $update->attributes->{$to_update_key} = $to_update_value;
            }
            $data = $update->save();
            $arr = $update->attributes->getNamesArray();
            $this->to_update = new Danidoble();
            if ($data->response) {
                return new Updater($data->response, $arr, $this->class_to_update);
            }
            return $data;
        }
        return $this;
    }
}