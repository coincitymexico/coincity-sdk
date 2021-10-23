<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Traits;
trait ParentParser
{
    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->attributes->toArray();
    }

    /**
     * @return false|string
     */
    public function toJSON(): ?string
    {
        return $this->attributes->toJSON();
    }

    /**
     * @return array
     */
    public function toReal(): array
    {
        return $this->attributes->toReal();
    }
}