<?php
namespace extas\components\bots\scenarios\schemas;

use extas\components\Item;
use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\bots\scenarios\schemas\ISchema;
use extas\interfaces\bots\scenarios\steps\IStep;
use extas\interfaces\extensions\bots\IExtensionScenario;
use extas\interfaces\repositories\IRepository;

/**
 * @method IRepository steps()
 */
class SchemaApi extends Item implements ISchema
{
    /**
     * @param IExtensionScenario $dispatcher
     */
    public function __invoke(IBotDispatcher $dispatcher): ?IStep
    {
        return $this->steps()->one([
            IStep::FIELD__NAME => $dispatcher->getStepName()
        ]);
    }

    protected function getSubjectForExtension(): string
    {
        return 'extas.schema.api';
    }
}
