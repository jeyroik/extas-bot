<?php
namespace extas\interfaces\bots\scenarios\steps;

use extas\interfaces\bots\dispatchers\IBotDispatcher;

interface IStepDispatcher
{
    /**
     * @return array [array $result, string $error]
     */
    public function __invoke(IBotDispatcher $dispatcher): array;
}
