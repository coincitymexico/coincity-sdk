<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Abstracts;
abstract class AParser
{
    protected $unserialized = null;

    /**
     * @return string
     */
    public function serialize(): string
    {
        return serialize($this);
    }

    /**
     * @param $str
     * @return mixed
     */
    public function unserialize($str)
    {
        $this->unserialized = unserialize($str);
        return $this->unserialized;
    }
}