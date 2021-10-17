<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK;

use Coincity\SDK\Exceptions\AuthenticityException;
use Coincity\SDK\Exceptions\NotUrlException;
use Coincity\SDK\Interfaces\ICredentials;

class Credentials implements ICredentials
{
    protected static string $insecure_http = "http://";
    protected static string $secure_http = "https://";
    /**
     * Eval if all project use a secure connection (https)
     * @var bool
     */
    protected static bool $ssl = true;
    /**
     * Debug or not
     * @var bool
     */
    protected static bool $debug = true;
    /**
     * Token to authenticate with website
     * @var string
     */
    protected static string $token;
    /**
     * Website to connect
     * @var string
     */
    protected static string $website = "https://coincitymexico.com/dash/api/";

    /**
     * Constructor, optionally can pass through here the token
     * @param string|null $token
     */
    public function __construct(string $token = null)
    {
        if ($token !== null) {
            $this->setToken($token);
        }
    }

    /**
     * Enable or disable the SSL/HTTPS connection
     * @param bool $ssl
     * @return void
     */
    public function setSsl(bool $ssl)
    {
        self::$ssl = $ssl;
    }

    /**
     * Enable or disable the SSL/HTTPS connection
     * @param bool $debug
     * @return void
     */
    public function setDebug(bool $debug)
    {
        self::$debug = $debug;
    }

    /**
     * Set the token to authenticate
     * @param string $token
     * @return void
     */
    public function setToken(string $token)
    {
        self::$token = $token;
    }

    /**
     * Set the website to connect
     * @param string $website
     * @return void
     * @throws AuthenticityException|NotUrlException
     */
    public function setWebsite(string $website)
    {
        if (!$this->verifyWebsite($website)) {
            throw new NotUrlException("Please provide a valid URL to connect with. Make sure to use a full URL. Example: https://example.com/");
        }
        self::$website = rtrim(rtrim($website, '/'), "\\") . "/";
    }

    /**
     * @param string $website
     * @return bool
     * @throws AuthenticityException
     */
    private function verifyWebsite(string $website): bool
    {
        if ((strpos($website, self::$secure_http) !== false)) {
            return true;
        }

        if (self::$ssl && (strpos($website, self::$insecure_http) !== false)) {
            throw new AuthenticityException("HTTP links are not secure, please upgrade to HTTPS.");
        }

        if (((strpos($website, self::$insecure_http) !== false) || (strpos($website, self::$secure_http) !== false))) {
            return true;
        }
        return false;
    }
}