<?php


namespace App;


class Jurgis
{
    public function responds(string $message): string
    {
        if($this->checkQuestion($message)) {
            return "Okis.";
        }

        return "Aha gerai.";
    }


    private function checkQuestion(string $message) 
    {
        if(substr(trim($message), -1)=='?') {
            return true;
        }
        return false;
    }


}
