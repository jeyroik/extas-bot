<?php
namespace extas\components\routes;

use extas\components\exceptions\MissedOrUnknown;
use extas\components\routes\dispatchers\JsonDispatcher;
use extas\interfaces\bots\IBot;
use extas\interfaces\extensions\bots\IExtensionBot;
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
        try {
            list($result, $error) = $this->getBot()->run($this->getRequestData());

            foreach ($this->getPluginsByStage(IStageAfterBot::NAME) as $plugin) {
                /**
                 * @var IStageAfterBot $plugin
                 */
                $plugin($result, $error);
            }

            $this->setResponseData($result, $error);
        } catch (\Exception $e) {
            $this->setResponseData([], $e->getMessage());
        }

        return $this->response;
    }

    public function help(): ResponseInterface
    {
        // через плагин что ли
    }

    protected function getBot(): IBot|IExtensionBot
    {
        $data  = $this->getRequestData();
        $botId = $data[IBot::FIELD__ID] ?? '';
        $bot   = $this->bots()->one([ IBot::FIELD__ID => $botId ]);

        if (!$bot) {
            throw new MissedOrUnknown('bot');
        }

        return $bot;
    }
}
