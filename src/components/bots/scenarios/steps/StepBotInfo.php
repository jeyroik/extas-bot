<?php
namespace extas\components\bots\scenarios\steps;

use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\bots\scenarios\steps\IStepDispatcher;

class StepBotInfo implements IStepDispatcher
{
    public function __invoke(IBotDispatcher $dispatcher): array
    {
        $bot = $dispatcher->getBot();

        return [
            $bot->__toArray(),
            ''
        ];
    }
}
