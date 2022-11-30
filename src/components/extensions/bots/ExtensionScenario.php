<?php
namespace extas\components\extensions\bots;

use extas\components\extensions\Extension;
use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\extensions\bots\IExtensionScenario;

class ExtensionScenario extends Extension implements IExtensionScenario
{
    public function getScenarioName(IBotDispatcher $dispatcher = null): string
    {
        $data = $dispatcher->getData();

        return $data[static::FIELD__SCENARIO_NAME] ?? '';
    }

    public function getStepName(IBotDispatcher $dispatcher = null): string
    {
        $data = $dispatcher->getData();

        return $data[static::FIELD__STEP_NAME] ?? '';
    }
}
