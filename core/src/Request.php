<?php namespace Main\Core;

class Request
{
    public function getMethod() : string
    {
        return strtolower($_SERVER["REQUEST_METHOD"]);
    }

    public function getUrl(): string
    {
        $url = $_SERVER["REQUEST_URI"];
        $position = strpos($url, "?");  

        if($position !== false)
            $url = substr($url, 0, $position);

        return $url;
    }
    
    public function is(string ...$url) : bool
    {
        foreach($url as $key => $value){
            if($this->getUrl() == $value)
                return true;
        }

        return false;
    }

    public function isPost() : bool
    {
        return $this->getMethod() == "post";
    }

    public function isGet() : bool
    {
        return $this->getMethod() == "get";
    }

    public function all(): array
    {
        return array_map(function($item){
            if(is_string($item))
                return htmlspecialchars($item);
            elseif(is_array($item))
            {
                $items = [];
                foreach($item as $key => $value)
                {
                    $items[] = htmlspecialchars($value);
                }
                return $items;
            }

        }, $_REQUEST);
    }

    public function input(string $key) : ?string
    {

        return $this->all()[$key] ?? null;
    }

    public function query(string $key) : ?string
    {
        return $_POST[$key] ?? null;
    }

}
