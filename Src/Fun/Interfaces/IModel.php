<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Interfaces;

use Coincity\SDK\Exceptions\AuthenticityException;
use Coincity\SDK\Exceptions\AuthException;
use Coincity\SDK\Exceptions\MethodException;
use Coincity\SDK\Exceptions\NotFoundException;
use Coincity\SDK\Exceptions\NotUrlException;
use Coincity\SDK\Fun\Update\Updater;
use Danidoble\Danidoble;

interface IModel
{
    /**
     * @return mixed
     */
    public static function getPaginated();

    /**
     * @param int $id
     * @return mixed
     */
    public static function findById(int $id);

    /**
     * @return Danidoble|Updater
     * @throws AuthException
     * @throws AuthenticityException
     * @throws MethodException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public function save();

    /**
     * @return Danidoble|Updater
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public function drop();
}