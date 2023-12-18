<?php

namespace App;

class Route
{
    public static array $routes = [];

    private string $path;
    private string $method;
    private $handler;

    private function __construct(string $path, string $method, $handler)
    {
        $this->path = $path;
        $this->method = $method;
        $this->handler = $handler;

        self::$routes[] = $this;
    }

    /*
     * @return Array<Route>
     * */
    public static function routes() : array
    {
        return self::$routes;
    }

    public function is($url, $method) : false|array
    {
        // Matches the path with the url and can even extract dynamic parameters from the url.
        $matches = [];
        $match = preg_match("#^$this->path$#", $url, $matches);
        if(! $match || strtoupper($this->method) !== strtoupper($method)) {
            return false;
        }

        return array_slice($matches, 1);
    }

    public function handle(...$args)
    {
        return (new $this->handler[0]())->{$this->handler[1]}(...$args);
    }

    public static function get(string $path, $handler) : self
    {
        return new Route($path, "GET", $handler);
    }

    public static function post(string $path, $handler) : self
    {
        return new Route($path, "POST", $handler);
    }

    public static function put(string $path, $handler) : self
    {
        return new Route($path, "PUT", $handler);
    }

    public static function delete(string $path, $handler) : self
    {
        return new Route($path, "DELETE", $handler);
    }

    public static function patch(string $path, $handler) : self
    {
        return new Route($path, "PATCH", $handler);
    }

    public static function match(string $method, string $path, $handler) : self
    {
        return new Route($path, $method, $handler);
    }
}