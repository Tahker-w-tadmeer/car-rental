<?php

use App\Model;
use App\Response;
use App\View;

function env($key, $default=null)
{
    $env = parse_ini_file(".env");

    return $env[$key] ?? $default;
}

function view($view, $data=[]): View
{
    return View::make($view, $data);
}

function viewWithLayout($view, $layout, $data=[]): View
{
    return View::makeWithLayout($view, $layout, $data);
}

function isLoggedIn() : bool {
    return isset($_SESSION["id"]);
}

function logout($url=null) {
    unset($_SESSION["id"]);

    $url ??= "/login";

    return response($url);
}

function old($key, $default=null)
{
    $old = getResponse()["old"] ?? null;
    if(! $old) return $default;

    return $old[$key] ?? $default;
}


function getUser()
{
    $model = new Model();

    return $_SESSION["user"] = $model->execute("Select * from user where id=?", [$_SESSION["id"]])->fetch_array(MYSQLI_ASSOC);
}

function getUserById($id) {
    $model = new Model();

    return $model->execute("Select * from user where id=?", [$id])->fetch_array(MYSQLI_ASSOC);
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