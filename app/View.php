<?php

namespace App;

class View
{
    protected string $file;
    protected ?string $html = null;

    private function __construct(protected string $view, protected array $data, protected $isLayout=false, protected string $layout="app")
    {
        $this->file = __DIR__ . "/../views/" . $this->view . ".view.php";

        if($this->isLayout) {
            $this->file = __DIR__ . "/../views/" . $this->view . ".layout.php";
        }
    }

    public static function make(string $view, array $data=[], $isLayout=false): self {
        return new View($view, $data, $isLayout);
    }

    public static function makeWithLayout(string $view, $layout, array $data=[]): self {
        return new View($view, $data, false, $layout);
    }

    public function html() : string
    {
        $layout = $this;
        if(! $this->isLayout) {
            $layout = View::make($this->layout, [
                "body" => $this->render(),
                "title" => $this->data["title"] ?? "",
                "user" => getUser() ?? null,
            ], true);
        }

        return $layout->render();
    }

    public function render(): string
    {
        if($this->html) {
            return $this->html;
        }

        foreach ( $this->data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include($this->file);
        $this->html = ob_get_contents();
        ob_end_clean();
        return $this->html;
    }

    public function __toString(): string
    {
        return $this->html();
    }
}