<?php namespace Main\Core;

class Session
{
    protected const FLASH_MESSAGES = "_flash_messages"; 
    public function __construct()
    {
        session_start();

        $_SESSION[self::FLASH_MESSAGES] = array_map(function($flashMessage){

            $flashMessage['remove'] = true;
            return $flashMessage;

        }, $_SESSION[self::FLASH_MESSAGES] ?? []);
    }

    public function flash(string $key, mixed $message = null)
    {
        if(is_null($message))
        {
            return $_SESSION[self::FLASH_MESSAGES][$key]['value'] ?? null;
        }

        $_SESSION[self::FLASH_MESSAGES][$key] = [
            "remove" => false,
            "value" => $message
        ];


    }

    public function set(string $key, mixed $value) : void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, mixed $default = false) : mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public function remove(string $key) : void
    {
        unset($_SESSION[$key]);
    }

    public function removeFlashMessage() : void
    {
        $flashMessages = $_SESSION[self::FLASH_MESSAGES] ?? [];
        $_SESSION[self::FLASH_MESSAGES] = array_filter($flashMessages, fn($flashMessage) => !$flashMessage['remove']);
    }

    public function __destruct()
    {
        $this->removeFlashMessage();
    }
    
}