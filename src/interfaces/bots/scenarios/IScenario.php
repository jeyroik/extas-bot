<?php
namespace extas\interfaces\bots\scenarios;

use extas\interfaces\IHasClass;
use extas\interfaces\IHasName;
use extas\interfaces\IHaveUUID;
use extas\interfaces\IItem;

interface IScenario extends IItem, IHaveUUID, IHasName, IHasClass
{
    public const SUBJECT = 'extas.bot.scenario';
}
