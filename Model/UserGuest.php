<?php

class UserGuest
{
    private string $name;
    public function GetName(): string
    {
        return $this->name;
    }
    public function SetName(string $name): void
    {
        if(CheckDataClass::CheckName($name))
        {
            $this->name = $name;
        }
        else
        {
            throw new Exception("Ошибка ввода имени");
        }
    }
    public Message $message;
    public function __construct(string $name, Message $message)
    {
        $this->setName($name);
        $this->message = $message;
    }

    public function __toString()
    {
        return $this->name;
    }
}