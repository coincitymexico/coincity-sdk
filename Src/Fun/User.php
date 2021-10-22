<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun;

use Coincity\SDK\Curl\Curl;
use Coincity\SDK\Exceptions\AuthenticityException;
use Coincity\SDK\Exceptions\AuthException;
use Coincity\SDK\Exceptions\NotFoundException;
use Coincity\SDK\Exceptions\NotUrlException;
use Coincity\SDK\Fun\Attr\AttributesUser;
use Coincity\SDK\Fun\Interfaces\IUser;
use Coincity\SDK\Traits\Models\Magic;
use Danidoble\Danidoble;

class User extends Curl implements IUser
{
    use Magic;

    public AttributesUser $attributes;

    /**
     * @param string|null $token
     */
    public function __construct(string $token = null)
    {
        parent::__construct($token);

        $this->setUserAttributes();
    }

    /**
     *
     */
    private function setUserAttributes()
    {
        $this->attributes = new AttributesUser();
    }

    /**
     * @param string $route
     * @param array $params
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    private static function getter(string $route, array $params = []): Danidoble
    {
        return (new User())->get($route, json_encode($params));
    }

    /**
     * @param int $id
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public static function getUser(int $id): Danidoble
    {
        return self::getter('user/' . $id);
    }

    /**
     * @param int $page
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public static function getUsers(int $page = 1): Danidoble
    {
        return self::getter('user', ['page' => $page]);
    }

    /**
     * @return AttributesUser
     */
    public function newUser(): AttributesUser
    {
        return $this->attributes;
    }
}