<?php

class Message
{
    private string $strMessage;
    public function GetStrMessage() : string
    {
        return $this->strMessage;
    }
    public function SetStrMessage(string $strMessage)
    {
        if(CheckDataClass::CheckMessage($strMessage))
        {
            $this->strMessage = $strMessage;
        }
        else
        {
            throw new Exception("Ошибка ввода сообщения");
        }

    }
    private string $data;
    public function GetData() : string
    {
        return $this->data;
    }
    public function SetData(string $data)
    {
        $this->data = $data;
    }

    public function __construct($strMessage, $data)
    {
        $this->SetStrMessage($strMessage);
        $this->SetData($data);
    }

    public function __toString()
    {
        return $this->getStrMessage();
    }
}