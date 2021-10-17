<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Curl;

use Coincity\SDK\Credentials;
use Coincity\SDK\Exceptions\AuthenticityException;
use Coincity\SDK\Exceptions\AuthException;
use Coincity\SDK\Exceptions\NotFoundException;
use Coincity\SDK\Exceptions\NotUrlException;
use Coincity\SDK\Interfaces\ICurl;
use Danidoble\Danidoble;

class Curl extends Credentials implements ICurl
{
    use Get, Post, Put, Delete;

    private $curl;
    private array $options;
    protected string $params;
    protected string $requested_url;

    /**
     * @param string|null $token
     */
    public function __construct(string $token = null)
    {
        parent::__construct($token);
        $this->options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_FRESH_CONNECT => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_HTTPHEADER => array(
                'Accept: application/json',
                'Authorization: Bearer ' . self::$token,
            ),
        ];
    }

    /**
     * @param $url
     * @throws NotUrlException
     */
    private function setUrl($url)
    {
        if (trim(trim($url, '/'), "\\") === "" || strpos($url, "..") !== false) {
            throw new NotUrlException("The URI provided is invalid, make a valid route of API is impossible");
        }
        $this->curl = curl_init();
        $this->requested_url = self::$website . $url;
        $this->options[CURLOPT_URL] = self::$website . $url;
    }

    /**
     * @param string $method
     */
    private function setMethod(string $method = "GET")
    {
        $this->options[CURLOPT_CUSTOMREQUEST] = $method;
    }

    /**
     * @param array $data
     */
    private function setPostFields(array $data)
    {
        $this->options[CURLOPT_POSTFIELDS] = $data;
    }

    /**
     * @throws NotUrlException
     */
    private function config()
    {
        if (!isset($this->options[CURLOPT_URL])) {
            throw new NotUrlException("A valid URL is needed");
        }
        curl_setopt_array($this->curl, $this->options);
        if (!self::$ssl) {
            curl_setopt($this->curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        }
        if (self::$debug) {
            curl_setopt($this->curl, CURLOPT_VERBOSE, true);
        }
    }

    /**
     * @param $response
     * @return bool
     * @throws AuthException
     * @throws NotFoundException
     */
    private function validateResponse($response): bool
    {
        if (isset($response->exception) && strpos($response->exception, "NotFoundHttpException") !== false) {
            throw new NotFoundException("The provided route not exist, please check '$this->requested_url'.", 404);
        } elseif (strpos($response->message, "Unauthenticated") !== false) {
            throw new AuthException("The authentication with API of website failed, please provide a valid Token.");
        } elseif (strpos($response->message, "Credenciales invalidas") !== false) {
            throw new AuthException("The provided token doesn't have enough permissions to access to this resource.");
        } elseif ($response->message === "") {
            return false;
        }
        return true;
    }

    /**
     * @return Danidoble
     * @throws AuthException
     * @throws AuthenticityException
     * @throws NotFoundException
     * @throws NotUrlException
     */
    private function response(): Danidoble
    {
        $this->config();
        $response = curl_exec($this->curl);
        if ($response === false && self::$debug) {
            if (strpos(curl_error($this->curl), "SSL certificate problem") !== false) {
                throw new AuthenticityException("This website doesn't have a valid SSL, in order to use here please disable the SSL/HTTPS validation");
            }
            dd(curl_error($this->curl), curl_errno($this->curl));
        }
        curl_close($this->curl);

        $object = json_decode($response, true);
        $response = new Danidoble();
        foreach ($object as $key => $value) {
            $response->{$key} = $value;
        }
        if ($this->validateResponse($response)) {
            return $response;
        }

        $response->__exception = "The response was not valid";
        return $response;
    }

    private function setParams($json)
    {
        $this->params = '';
        if (trim($json) !== "") {
            foreach (json_decode($json) as $key => $val) {
                if (trim($this->params) === '') {
                    $this->params .= '?';
                } else {
                    $this->params .= '&';
                }
                $this->params .= $key . '=' . urlencode($val);
            }
        }
    }
}