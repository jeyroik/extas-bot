<?php
namespace extas\interfaces\bots\scenarios\steps;

use extas\interfaces\IHasClass;
use extas\interfaces\IHasDescription;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;

/**
 * Interface IStep
 *
 * @author jeyroik@gmail.com
 */
interface IStep extends IItem, IHasName, IHasDescription, IHasClass
{
    public const SUBJECT = 'extas.bot.scenario.step';
}
