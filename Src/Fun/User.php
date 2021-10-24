<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Fun;

use Coincity\SDK\Curl\Configuration;
use Coincity\SDK\Exceptions\AuthenticityException;
use Coincity\SDK\Exceptions\AuthException;
use Coincity\SDK\Exceptions\MethodException;
use Coincity\SDK\Exceptions\NotFoundException;
use Coincity\SDK\Exceptions\NotUrlException;
use Coincity\SDK\Fun\Attr\AttributesUser;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Interfaces\IUser;
use Coincity\SDK\Fun\Traits\ParentParser;
use Coincity\SDK\Traits\Models\Magic;
use Danidoble\Danidoble;

class User extends Configuration implements IUser, IParser
{
    use Magic, ParentParser;

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
     * Make an instance of attributes to this model
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
     * @param string $method
     * @param string $route
     * @param array $data
     * @param array $params
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws MethodException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    private function setter(string $method, string $route, array $data = [], array $params = []): Danidoble
    {
        if ($method === "POST") {
            return $this->post($route, $data, json_encode($params));
        } elseif ($method === "PUT" || $method === "PATCH") {
            return $this->put($route, $data, json_encode($params));
        }
        throw new MethodException("The method requested isn't valid");
    }

    /**
     * @param int $id
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public static function findById(int $id): Danidoble
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
    public static function getPaginated(int $page = 1): Danidoble
    {
        return self::getter('user', ['page' => $page]);
    }

    /**
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws MethodException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public function save(): Danidoble
    {
        if (isset($this->attributes->id)) { // update user
            return $this->setter('PUT', 'user/' . $this->attributes->getId(), $this->attributes->toReal());
        }
        return $this->setter('POST', 'user', $this->attributes->toReal());// new user
    }

    /**
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public function drop(): Danidoble
    {
        if (!isset($this->attributes->id)) {
            $error = new Danidoble();
            $error->message = "The identifier of user is required to delete";
            $error->error = true;
            $error->errors = [
                "id" => "The identifier of user is required to delete"
            ];
            return $error;
        }
        return $this->delete('user/' . $this->attributes->getId(), []);
    }
}