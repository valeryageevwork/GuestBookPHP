<?php

class MainController
{
    private $model;

    public function __construct()
    {
        $this->model = new SessionModel();
    }

    public function handleRequest()
    {
        $error = null;
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = htmlspecialchars(trim($_POST["username"] ?? ''));
            $message = htmlspecialchars(trim($_POST["message"] ?? ''));

            try
            {
                $this->model->addUserGuest($username, $message, $_SESSION);
            }
            catch (Exception $e)
            {
                $error = $e->getMessage();
            }
        }
        $data = $this->model->getAll($_SESSION["userGuestObjects"]);
        $this->show($data, $error);
    }

    private function show(array $data, ?string $error)
    {
        $this->IncludeTemplate("View/Layout.php", [
            "resultMessages" => $data,
            "resultError" => $error
        ]);
    }

    private function IncludeTemplate(string $php, $arr)
    {
        extract($arr);
        include($php);
    }
}
