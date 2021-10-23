<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Interfaces;
interface IParser
{
    /**
     * @return false|string
     */
    public function toJSON(): ?string;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return array
     */
    public function toReal(): array;
}