<?php
namespace extas\interfaces\stages;

use extas\interfaces\bots\IBot;

interface IStageDefineScenario
{
    public const NAME = 'extas.bot.scenario';

    /**
     * Try to detect scenario and put it's name to the $scenario var.
     * 
     * @return bool is valid scenario found
     */
    public function __invoke(array $data, IBot $bot, string &$scenario): bool;
}
