<?php
namespace extas\components\plugins\bots;

use extas\components\plugins\Plugin;
use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\extensions\bots\IExtensionScenario;
use extas\interfaces\stages\IStageDefineScenario;

class PluginScenarioByName extends Plugin implements IStageDefineScenario
{
    public const FIELD__SCENARIO_NAME = 'scenario_name';

    /**
     * @param IExtensionScenario $dispatcher
     */
    public function __invoke(IBotDispatcher $dispatcher, string &$scenario): bool
    {
        $name = $dispatcher->getScenarioName();

        if ($name) {
            $scenario = $name;
            return true;
        }

        return false;
    }
}
