<?php namespace Main\Core\Exceptions;

      use Exception;

class SqlException extends Exception
{
    protected $code = 500;
    protected $message = "Error While Connecting To The Server";
}