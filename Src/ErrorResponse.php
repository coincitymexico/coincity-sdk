<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK;
class ErrorResponse
{
    public string $message;
    public bool $error;
    public array $errors;
    public ErrorResponse $request;
    public string $url;
    public string $method;
    /**
     * @var array|string|null
     */
    public $data;
    public string $content_type;

    /**
     * @param null $response
     */
    public function __construct($response = null, array $curl = null)
    {
        if ($response !== null && $curl !== null) {
            return $this->bind($response, $curl);
        }
        return $this;
    }

    public function bind($response, array $curl): ErrorResponse
    {
        $this->message = $response->message;
        $this->error = true;
        $this->errors = $response->errors;
        $this->request = new ErrorResponse();
        $this->request->url = $curl['url'];
        $this->request->method = $curl['method'];
        $this->request->content_type = $curl['content_type'];
        $this->request->data = $curl['data'];

        return $this;
    }

    public function __toString()
    {
        return json_encode($this);
    }

    public function __set($name, $value)
    {
        $this->{$name} = $value;
    }

    public function __get($name)
    {
        if (isset($this->{$name})) {
            return $this->{$name};
        }
        return null;
    }

    public function __isset($name)
    {
        if (isset($this->{$name})) {
            return true;
        }
        return false;
    }

}