<?php

namespace HuaWeiCloud\Common\v20200320;

/**
 * 基础类
 * Class Base
 * @package Common\v20200320
 */
class Profile
{
    protected static $key;
    protected static $secret;

    public static function setKey($key)
    {
        self::$key = $key;
    }

    public static function setSecret($secret)
    {
        self::$secret = $secret;
    }

    public static function getKey()
    {
        return self::$key;
    }

    public static function getSecret()
    {
        return self::$secret;
    }
}