<?php


namespace App;


class Jurgis
{
    public function responds(string $message): string
    {
        if ($this->checkGreeting($message)) {
            return "Labas!";
        }

        if ($this->checkShout($message)) {
            return "Oi oi, atvėsk!";
        }

        if ($this->checkQuestion($message)) {
            return "Okis.";
        }

        if ($this->checkSilence($message)) {
            return "Alio! Kuku?";
        }

        return "Aha gerai.";
    }

    private function checkGreeting(string $message)
    {
        if ($message == "Sveiki" || $message == "LABAS") {
            return true;
        }
        return false;
    }

    private function checkQuestion(string $message)
    {
        if (substr(trim($message), -1) == '?') {
            return true;
        }
        return false;
    }

    private function checkShout(string $message)
    {
        if (mb_strtoupper(trim($message)) === trim($message) && preg_match("/[a-z]/i", trim($message)) > 0) {
            return true;
        }
        return false;
    }

    private function checkSilence(string $message)
    {
        if (trim($message) == '') {
            return true;
        }
        return false;
    }
}
