<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Interfaces;

use Danidoble\Danidoble;

interface IUser
{
    /**
     * @return Danidoble
     */
    public static function getUsers(): Danidoble;

    /**
     * @param int $id
     * @return Danidoble
     */
    public static function getUser(int $id): Danidoble;

}