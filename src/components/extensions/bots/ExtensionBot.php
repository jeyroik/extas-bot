<?php
namespace extas\components\extensions\bots;

use extas\components\extensions\Extension;
use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\bots\IBot;
use extas\interfaces\extensions\bots\IExtensionBot;

class ExtensionBot extends Extension implements IExtensionBot
{
    public function run(array $data, IBot $bot = null): array
    {
        $dispatcher = $bot->buildClassWithParameters([
            IBotDispatcher::FIELD__BOT  => $bot,
            IBotDispatcher::FIELD__DATA => $data
        ]);

        return $dispatcher();
    }
}
