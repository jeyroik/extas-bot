<?php
namespace extas\interfaces\extensions\bots;

interface IExtensionScenario
{
    public const FIELD__SCENARIO_NAME = 'scenario_name';
    public const FIELD__STEP_NAME = 'step_name';

    public function getScenarioName(): string;
    public function getStepName(): string;
}
