<?php
namespace extas\components\bots;

use extas\components\Item;
use extas\components\TDispatcherWrapper;
use extas\components\THasStringId;
use extas\interfaces\bots\IBot;

class Bot extends Item implements IBot
{
    use TDispatcherWrapper;
    use THasStringId;
    
    public function getToken(): string
    {
        return $this->config[static::FIELD__TOKEN] ?? '';
    }

    public function setToken(string $token): IBot
    {
        $this->config[static::FIELD__TOKEN] = $token;

        return $this;
    }

    public function getPlatform(): string
    {
        return $this->config[static::FIELD__PLATFORM] ?? ''; 
    }

    public function setPlatform(string $platform): IBot
    {
        $this->config[static::FIELD__PLATFORM] = $platform;

        return $this;
    }

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
