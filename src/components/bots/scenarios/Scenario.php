<?php
namespace extas\components\bots\scenarios;

use extas\components\Item;
use extas\components\THasClass;
use extas\components\THasName;
use extas\components\THasStringId;
use extas\interfaces\bots\scenarios\IScenario;

class Scenario extends Item implements IScenario
{
    use THasStringId;
    use THasName;
    use THasClass;

    protected function getSubjectForExtension(): string
    {
        return static::SUBJECT;
    }
}
