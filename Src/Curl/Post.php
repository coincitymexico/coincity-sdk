<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Curl;
use Coincity\SDK\Exceptions\AuthenticityException;
use Coincity\SDK\Exceptions\AuthException;
use Coincity\SDK\Exceptions\NotFoundException;
use Coincity\SDK\Exceptions\NotUrlException;
use Danidoble\Danidoble;

trait Post
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
    protected function post(string $route, array $data, string $json = ""): Danidoble
    {
        $this->setParams($json);
        $this->setUrl($route . $this->params);
        $this->setMethod("POST");
        $this->setPostFields($data);
        return $this->response();
    }
}
