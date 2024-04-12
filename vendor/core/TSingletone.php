<?php


namespace core;


trait TSingletone
{
    private static $instance = null;

    public static function getInstance()
    {
        if(self::$instance === null)
        {
            self::$instance = new self;
        }
        return self::$instance;
    }

}