<?php
namespace extas\interfaces\extensions\bots;

interface IExtensionScenario
{
    public const FIELD__STEP_NAME = 'step_name';

    public function getStepName(): string;
}
