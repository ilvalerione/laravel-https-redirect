<?php

namespace AventureCloud\HttpsRedirect;


class HttpsRedirectService
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
        if(is_string($this->config['environments']) && $this->config['environments'] === '*'){
            return true;
        }

        if(is_string($this->config['environments']) && $this->config['environments'] === $env){
            return true;
        }

        if(is_array($this->config['environments']) && in_array($env, $this->config['environments'])){
            return true;
        }

        return false;
    }
}