<?php
namespace extas\components\bots\dispatchers;

use extas\components\Item;
use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\bots\IBot;
use extas\interfaces\bots\scenarios\IScenario;
use extas\interfaces\bots\scenarios\IScenarioDispatcher;
use extas\interfaces\bots\scenarios\schemas\ISchema;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\stages\IStageDefineScenario;

/**
 * @method IRepository scenarios()
 */
abstract class Dispatcher extends Item implements IBotDispatcher
{
    public function __invoke(): array
    {
        $scenario = $this->getScenario();

        if (!$scenario) {
            return [[], 'Can not detect scenario'];
        }

        /**
         * @var ISchema $scenarioSchema
         */
        $scenarioSchema = $scenario->buildClassWithParameters([
            IScenarioDispatcher::FIELD__BOT_DISPATCHER => $this,
            IScenarioDispatcher::FIELD__SCENARIO => $scenario
        ]);

        $step = $scenarioSchema($this);

        return $step($this);
    }

    protected function getScenario(): ?IScenario
    {
        return $this->scenarios()->one([
            IScenario::FIELD__NAME => $this->getScenarioName()
        ]);
    }

    protected function getScenarioName(): string
    {
        $scenario = 'help';
        $stage = IStageDefineScenario::NAME . '.' . $this->getBot()->getPlatform();

        foreach ($this->getPluginsByStage($stage) as $plugin) {
            $valid = $plugin($this, $scenario);

            if ($valid) {
                break;
            }
        }

        return $scenario;
    }

    public function getBot(): IBot
    {
        return $this->config[static::FIELD__BOT];
    }

    public function getData(): array
    {
        return $this->config[static::FIELD__DATA] ?? [];
    }
}
