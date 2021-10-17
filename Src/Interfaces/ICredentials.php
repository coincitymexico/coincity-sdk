<?php
/**
 * Created by (c)danidoble 2021.
 * @author danidoble <danidoble | ddanidoble@gmail.com>
 * @website https://github.com/danidoble
 * @website https://danidoble.com
 */

namespace Coincity\SDK\Interfaces;

interface ICredentials
{
    /**
     * @param string $token
     * @return void
     */
    public function setToken(string $token);

    /**
     * @param string $website
     * @return void
     */
    public function setWebsite(string $website);

    /**
     * @param bool $ssl
     * @return void
     */
    public function setSsl(bool $ssl);

    /**
     * @param bool $debug
     * @return void
     */
    public function setDebug(bool $debug);
}