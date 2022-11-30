<?php
namespace extas\interfaces\stages;

interface IStageAfterBot
{
    public const NAME = 'extas.after.bot';

    public function __invoke(array &$result, string &$error): void;
}
