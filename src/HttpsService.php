<?php

namespace AventureCloud\ForceHttps;


class HttpsService
{
    /**
     * @var mixed
     */
    public $config;

    /**
     * HttpsManager constructor.
     *
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Check if given environment need redirect
     *
     * @param string $env
     * @return bool
     */
    public function needRedirect(string $env)
    {
        if(is_string($this->config['environment']) && $this->config['environment'] === '*'){
            return true;
        }

        if(in_array($env, $this->config['environments'])){
            return true;
        }

        return false;
    }
}