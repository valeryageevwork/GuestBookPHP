<?php

class MainController
{
    private $model;

    public function __construct()
    {
        $this->model = new SessionModel();
    }

    public function show()
    {
        $data = $this->model->data;
        $error = $this->model->error;
        $this->IncludeTemplate("View/Layout.php", ["resultMessages" => $data, "resultError" => $error]);
    }
    private function IncludeTemplate(string $php, $arr)
    {
        extract($arr);
        include($php);
    }
}
