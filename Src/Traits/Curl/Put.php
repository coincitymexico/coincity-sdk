<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Traits\Curl;

use Coincity\SDK\Exceptions\AuthenticityException;
use Coincity\SDK\Exceptions\AuthException;
use Coincity\SDK\Exceptions\NotFoundException;
use Coincity\SDK\Exceptions\NotUrlException;
use Danidoble\Danidoble;

trait Put
{
    /**
     * @param string $route
     * @param array $data
     * @param string $json
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    protected function put(string $route, array $data, string $json = ""): Danidoble
    {
        $this->setParams($json);
        $this->setUrl($route . $this->params);
        $this->setMethod("PUT");
        $this->setContentType("application/json");
        $this->setPutFields($data);
        return $this->response();
    }
}
