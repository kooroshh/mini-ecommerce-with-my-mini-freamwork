<?php namespace Main\Core\Exceptions;

      use Exception;

class NotFoundException extends Exception
{
    protected $code = 404;
    protected $message = "Not Found";
}