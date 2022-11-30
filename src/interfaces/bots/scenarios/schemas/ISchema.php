<?php
namespace extas\interfaces\bots\scenarios\schemas;

use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\bots\scenarios\steps\IStep;

interface ISchema
{
    public function __invoke(IBotDispatcher $dispatcher): ?IStep;
}
