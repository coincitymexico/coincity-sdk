<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun\Interfaces;

interface IUser
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

}