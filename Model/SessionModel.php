<?php

class SessionModel
{
    public function getAll($sessionData)
    {
        $arr = [];
        foreach ($sessionData as $user)
        {
            $arr[] =
            [
                'name' => $user->GetName(),
                'message' => $user->message->GetStrMessage(),
                'date' => $user->message->GetData(),
            ];
        }
        return $arr;
    }

    public function addUserGuest(string $username, string $message, &$sessionData)
    {
        if ($username === '' || $message === '')
        {
            throw new Exception("Пустое сообщение или имя!");
        }

        $date = date('d-m-Y H:i:s');
        $messageObject = new Message($message, $date);
        $userGuest = new UserGuest($username, $messageObject);
        $sessionData["userGuestObjects"][] = $userGuest;
    }
}
