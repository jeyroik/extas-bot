<?php
namespace extas\components\routes;

use extas\components\routes\dispatchers\JsonDispatcher;
use extas\interfaces\bots\dispatchers\IBotDispatcher;
use extas\interfaces\bots\IBot;
use extas\interfaces\repositories\IRepository;
use extas\interfaces\stages\IStageAfterBot;
use Psr\Http\Message\ResponseInterface;

/**
 * @method IRepository bots()
 */
class RouteBot extends JsonDispatcher
{
    public function execute(): ResponseInterface
    {
        $data = $this->getRequestData();
        $botId = $data[IBot::FIELD__ID] ?? '';

        /**
         * @var IBot $bot
         */
        $bot = $this->bots()->one([
            IBot::FIELD__ID => $botId
        ]);

        $dispatcher = $bot->buildClassWithParameters([
            IBotDispatcher::FIELD__BOT => $bot,
            IBotDispatcher::FIELD__DATA => $data
        ]);

        list($result, $error) = $dispatcher();

        foreach ($this->getPluginsByStage(IStageAfterBot::NAME) as $plugin) {
            /**
             * @var IStageAfterBot $plugin
             */
            $plugin($result, $error);
        }

        $this->setResponseData($result, $error);

        return $this->response;
    }

    public function help(): ResponseInterface
    {
        // через плагин что ли
    }
}
