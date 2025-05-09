<?php

class SessionModel
{
    public $data;
    public $error;

    public function __construct()
    {
        $this->GetServerDataAndChange();
        $this->data = $this->ExtractSessionGuest();
        $this->error = $this->GetError();
    }

    private function GetServerDataAndChange()
    {
        $_SESSION["error"] = null;

        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = htmlspecialchars(trim($_POST["username"]));
            $message = htmlspecialchars(trim($_POST["message"]));


            if ($username === '' || $message === '') {
                $_SESSION["error"] = "Имя и сообщение не могут быть пустыми!";
            }

            try
            {
                $date = date('d-m-Y H:i:s');
                $messageObject = new Message($message, $date);
                $userGuest = new UserGuest($username, $messageObject);
                $_SESSION["userGuestObjects"][] = $userGuest;
            }
            catch(Exception $e)
            {
                $_SESSION["error"] = $e->getMessage();
            }
        }
    }

    private function ExtractSessionGuest(): array
    {
        $arr = [];
        $_SESSION["userGuestObjects"] = $_SESSION["userGuestObjects"] ?? [];
        if(isset($_SESSION["userGuestObjects"]))
        {
            foreach ($_SESSION["userGuestObjects"] as $user)
            {
                $arr[] = [
                   'name'    => $user->GetName(),
                   'message' => $user->message->GetStrMessage(),
                   'date'    => $user->message->GetData(),
                ];
            }
        }
        return $arr;
    }

    private function GetError()
    {
        return $_SESSION["error"];
    }
}
