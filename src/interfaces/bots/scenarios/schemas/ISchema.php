<?php
namespace extas\interfaces\bots\scenarios\schemas;

use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\bots\scenarios\steps\IStep;
use extas\interfaces\IItem;

interface ISchema extends IItem
{
    public function __invoke(IBotDispatcher $dispatcher): ?IStep;
}
