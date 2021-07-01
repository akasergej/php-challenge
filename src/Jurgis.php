<?php


namespace App;


class Jurgis
{
    public function responds(string $message): string
    {
        if($this->checkQuestion($message)) {
            return "Okis.";
        }

        if($this->checkShout($message)) {
            return "Oi oi, atvėsk!";
        }

        if($this->checkSilence($message)) {
            return "Alio! Kuku?";
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

    private function checkShout(string $message) 
    {
        if(substr(trim($message), -1)=='!') {
            return true;
        }
        return false;
    }

    private function checkSilence(string $message) 
    {
        if(trim($message) == '') {
            return true;
        }
        return false;
    }


}
