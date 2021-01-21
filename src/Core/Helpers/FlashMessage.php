<?php


namespace App\Core\Helpers;

# src/Core/Helpers/FlashMessage.php

/**
 * Class FlashMessage
 *
 */
class FlashMessage
{
    /**
     * @var string
     */
    private string $sessionKey;

    /**
     * get the value of the key passed as argument.
     * after reading the value unsets it
     * @param string $key
     * @param string $defaultValue
     * @return mixed|string
     */
    public static function get(string $key, $defaultValue = ''){

        $value = $_SESSION["flash-message"][$key]??$defaultValue;

        self::unset($key);
        return $value;



    }

    /**
     * @param string $key
     * @param $value
     */
    public static function set(string $key, $value){

        $_SESSION["flash-message"][$key] = $value;
    }

    /**
     * @param string $key
     */
    public static function unset(string $key){


        unset($_SESSION["flash-message"][$key]);

    }
}