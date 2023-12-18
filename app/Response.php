<?php

namespace App;
class Response
{
    private function __construct(
        protected string $url, protected int $status, protected $response)
    {
    }

    public function handle()
    {
        http_response_code($this->status);

        $accepts = getallheaders()["Accept"] ?? "";
        if ($accepts === "application/json") {
            header("Content-Type: application/json");
            echo json_encode(
                array_merge($this->response ?? [], [
                    "_redirect" => $this->url,
                ])
            );
            die();
        }

        header("Location: $this->url");
        $_SESSION["response"] = $this->response;
        die();
    }

    public static function make(string $url, $status = 200, $response = null): self
    {
        return new self($url, $status, $response);
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setResponse($response): self
    {
        $this->response = $response;

        return $this;
    }
}