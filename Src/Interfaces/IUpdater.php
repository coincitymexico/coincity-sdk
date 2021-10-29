<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Interfaces;

use Coincity\SDK\Exceptions\VisibilityException;
use Coincity\SDK\Fun\Update\Updater;
use Danidoble\Danidoble;

interface IUpdater
{
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value);

    /**
     * @throws VisibilityException
     */
    public function __get($name);

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name);

    /**
     * @return string
     */
    public function __toString();

    /**
     * @param $data
     * @param $names
     * @param $class_name
     */
    public function __construct($data, $names, $class_name);

    /**
     * @return Danidoble
     */
    public function toDanidoble(): Danidoble;

    /**
     * @return array
     */
    public function toArray(): array;

    /**
     * @return string
     */
    public function toJSON(): string;

    /**
     * @return Updater|mixed
     */
    public function save();
}