<?php
namespace extas\components\bots\dispatchers;

class DispatcherApi extends Dispatcher
{
    protected function getSubjectForExtension(): string
    {
        return 'extas.bot.dispatcher.api';
    }
}
