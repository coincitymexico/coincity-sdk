<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Traits;
trait Parser
{
    /**
     * @return false|string
     */
    public function toJSON(): ?string
    {
        $json = json_encode($this);
        $force = [];
        foreach ($this->public as $public) {
            if (isset($this->{$public})) {
                $force[$public] = $this->{$public};
            } else {
                $force[$public] = null;
            }
        }
        return json_encode(array_merge($force, json_decode($json, true)));
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $json = json_encode($this);
        $force = [];
        foreach ($this->public as $public) {
            if (isset($this->{$public})) {
                $force[$public] = $this->{$public};
            } else {
                $force[$public] = null;
            }
        }
        return array_merge($force, json_decode($json, true));
    }

    /**
     * @return array
     */
    public function toReal(): array
    {
        $values = [];
        foreach ($this->toArray() as $item => $value) {
            if (isset($this->_real_name[$item])) {
                $values[$this->_real_name[$item]] = $value;
            } else {
                $values[$item] = $value;
            }
        }
        foreach ($this->_append_const as $cons) {
            $values[$cons] = $this->{$cons};
        }

        return $values;
    }
}