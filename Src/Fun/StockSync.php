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
use Coincity\SDK\Fun\Attr\AttributesStockSync;
use Coincity\SDK\Fun\Interfaces\IModel;
use Coincity\SDK\Fun\Interfaces\IParser;
use Coincity\SDK\Fun\Traits\ParentParser;
use Coincity\SDK\Fun\Update\Updater;
use Coincity\SDK\Traits\Models\Magic;
use Danidoble\Danidoble;

class StockSync extends Configuration implements IModel, IParser
{
    use Magic, ParentParser;

    public AttributesStockSync $attributes;

    /**
     * @param string|null $token
     */
    public function __construct(string $token = null)
    {
        parent::__construct($token);

        $this->setAttributes();
    }

    /**
     * Make an instance of attributes to this model
     */
    private function setAttributes()
    {
        $this->attributes = new AttributesStockSync();
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
        return (new StockSync())->get($route, json_encode($params));
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
     * @return Danidoble|Updater
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public static function findById(int $id)
    {
        $data = self::getter('sae-stock-sync/' . $id);
        $arr = (new StockSync())->attributes->getNamesArray();
        if (isset($data->response) && is_array($data->response)) {
            return new Updater($data->response, $arr, StockSync::class);
        }
        return $data;
    }

    /**
     * @param int $page
     * @return Danidoble|Updater
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public static function getPaginated(int $page = 1)
    {
        $data = self::getter('sae-stock-sync', ['page' => $page]);
        $arr = (new StockSync())->attributes->getNamesArray();
        if (isset($data->response['data'])) {
            $dx = new Danidoble();
            $dx->response = [];
            foreach ($data->response['data'] as $response) {
                $dx->response[] = new Updater($response, $arr, StockSync::class);
            }
            return $dx;
        }
        return $data;
    }

    /**
     * @return Danidoble|Updater
     * @throws AuthException
     * @throws AuthenticityException
     * @throws MethodException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public function save()
    {
        /*
         * Update Stock Sync only if the attributes has the identifier
         */
        if (isset($this->attributes->id)) { // update Stock Sync
            $data = $this->attributes->toReal();
            foreach ($data as $key => $value) {
                if ($value === null) {
                    unset($data[$key]);
                }
            }
            $result = $this->setter('PUT', 'sae-stock-sync/' . $this->attributes->getId(), $data);
            $arr = (new StockSync())->attributes->getNamesArray();
            if (isset($result->response) && is_array($result->response)) {
                return new Updater($result->response, $arr, StockSync::class);
            }
            return $result;
        }

        /*
         * Add new Stock Sync
         */
        $data = $this->attributes->toReal();
        if (isset($data['_def_val'])) {
            unset($data['_def_val']);
        }
        foreach ($data as $key => $value) {
            foreach ($this->attributes->_def_val as $key_def => $val_def) {
                if ($key === $key_def && $value === null) {
                    $data[$key] = $val_def;
                }
            }
        }
        $result = $this->setter('POST', 'sae-stock-sync', $data);// new Stock Sync
        $arr = (new StockSync())->attributes->getNamesArray();
        if (isset($result->response) && is_array($result->response)) {
            return new Updater($result->response, $arr, StockSync::class);
        }
        return $result;
    }

    /**
     * @return Danidoble|Updater
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    public function drop()
    {
        if (!isset($this->attributes->id)) {
            $error = new Danidoble();
            $error->message = "The identifier of Stock Sync is required to delete";
            $error->error = true;
            $error->errors = [
                "id" => "The identifier of Stock Sync is required to delete"
            ];
            return $error;
        }


        $result = $this->delete('sae-stock-sync/' . $this->attributes->getId(), []);
        $arr = (new StockSync())->attributes->getNamesArray();
        if (isset($result->response) && is_array($result->response)) {
            return new Updater($result->response, $arr, StockSync::class);
        }
        return $result;
    }
}