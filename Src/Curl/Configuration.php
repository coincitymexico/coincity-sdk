<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Curl;

use Coincity\SDK\Credentials;
use Coincity\SDK\ErrorResponse;
use Coincity\SDK\Exceptions\APIException;
use Coincity\SDK\Exceptions\AuthenticityException;
use Coincity\SDK\Exceptions\AuthException;
use Coincity\SDK\Exceptions\NotFoundException;
use Coincity\SDK\Exceptions\NotUrlException;
use Coincity\SDK\Interfaces\ICurl;
use Coincity\SDK\Traits\Curl\Delete;
use Coincity\SDK\Traits\Curl\Get;
use Coincity\SDK\Traits\Curl\Post;
use Coincity\SDK\Traits\Curl\Put;
use Danidoble\Danidoble;

class Configuration extends Credentials implements ICurl
{
    use Get, Post, Put, Delete;

    private array $requested_data = [
        "url" => null,
        "method" => null,
        "data" => null,
        "content_type" => "Automatic",
    ];
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
    }

    /**
     * Set options of cUrl with the token defined
     * @param null $token
     */
    private function bind($token = null): void
    {
        if ($token !== null) {
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
    }

    /**
     * @param $url
     * @throws NotUrlException
     * @throws AuthException
     */
    private function setUrl($url): void
    {
        if (trim(trim($url, '/'), "\\") === "" || strpos($url, "..") !== false) {
            throw new NotUrlException("The URI provided is invalid, make a valid route of API is impossible");
        }
        if (self::$token === null || trim(self::$token) == "") {
            throw new AuthException("The provided token doesn't valid");
        }
        $this->curl = curl_init();
        $this->requested_url = self::$website . $url;
        $this->bind(self::$token);
        $this->requested_data['url'] = $this->requested_url;
        $this->options[CURLOPT_URL] = $this->requested_url;
    }

    /**
     * @param string $method
     */
    private function setMethod(string $method = "GET"): void
    {
        $this->requested_data['method'] = $method;
        $this->options[CURLOPT_CUSTOMREQUEST] = $method;
    }

    /**
     * @param string $type
     */
    private function setContentType(string $type): void
    {
        $this->requested_data['content_type'] = "Content-Type: " . $type;
        $this->options[CURLOPT_HTTPHEADER][] = "Content-Type: " . $type;
    }

    /**
     * @param array $data
     */
    private function setPostFields(array $data): void
    {
        $this->requested_data['data'] = $data;
        $this->options[CURLOPT_POSTFIELDS] = $data;
    }

    /**
     * @param array $data
     */
    private function setPutFields(array $data): void
    {
        $json = json_encode($data);
        $this->requested_data['data'] = $json;
        $this->options[CURLOPT_POSTFIELDS] = $json;
    }

    /**
     * @throws NotUrlException
     */
    private function config(): void
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
        } elseif (isset($response->exception)) {
            throw new APIException("Hmm! Looks like a joke but sorry it's real my friend. An error occurred in the API.");
        } elseif ($response->message === "") {
            return false;
        }
        return true;
    }

    /**
     * @param $response
     * @return bool
     */
    private function isInvalidData($response): bool
    {
        if (isset($response->errors) && is_array($response->errors) && count($response->errors) > 0) {
            return true;
        }
        return false;
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
        if ($this->isInvalidData($response)) {
            $error = new Danidoble();
            $error->error = (new ErrorResponse($response, $this->requested_data));
            return $error;
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