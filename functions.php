<?php

use App\Response;

function env($key, $default=null)
{
    $env = parse_ini_file(".env");

    return $env[$key] ?? $default;
}

function response($url, $status=200) : Response
{
    return Response::make($url, $status);
}

function getResponse()
{
    return $_SESSION["response"] ?? null;
}

function getErrors()
{
    $response = getResponse();
    if(! $response) return null;

    return $response["error"];
}

function hasError()
{
    return (bool) getErrors();
}

function clearResponse()
{
    unset($_SESSION["response"]);
}