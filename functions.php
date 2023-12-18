<?php

use App\Model;
use App\Response;

function isLoggedIn() : bool {
    return isset($_SESSION["id"]);
}


function getUser()
{
    if(isset($_SESSION["user"]) && $_SESSION["user"] && $_SESSION["id"] == $_SESSION["user"]["user_id"]) {
        return $_SESSION["user"];
    }

    $model = new Model();

    return $_SESSION["user"] = $model->execute("Select * from user where user_id=?", [$_SESSION["id"]])->fetch_array(MYSQLI_ASSOC);
}

function getUserById($id) {
    $model = new Model();

    return $model->execute("Select * from user where user_id=?", [$id])->fetch_array(MYSQLI_ASSOC);
}

function response($url, $status=200) : Response
{
    return Response::make($url, $status);
}

function logout($url=null) {
    unset($_SESSION["id"]);

    unset($_SESSION["user"]);

    $url ??= "/login";

    return response($url);
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