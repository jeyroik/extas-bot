<?php
namespace extas\interfaces\bots\dispatchers;

use extas\interfaces\bots\IBot;

interface IBotDispatcher
{
    public const FIELD__BOT  = 'bot';
    public const FIELD__DATA = 'data';

    /**
     * @return array [array $result, string $error]
     */
    public function __invoke(): array;
    
    public function getBot(): IBot;
    public function getData(): array;
}
