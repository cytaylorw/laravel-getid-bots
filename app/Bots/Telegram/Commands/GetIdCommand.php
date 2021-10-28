<?php

namespace App\Bots\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Supports\Traits\Logs\Telegram as TelegramLog;

/**
 * Class GetIdCommand.
 */
class GetIdCommand extends Command
{
    use TelegramLog;

    /**
     * @var string Command Name
     */
    protected $name = 'getId';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['getid','getChatId','getchatid','ChatId','chatid','id'];

    /**
     * @var string Command Description
     */
    protected $description = 'Get Chat ID command.';

    /**
     * {@inheritdoc}
     */
    public function handle()
    
    {
        $response = $this->getUpdate();
        $text = $response->getChat()['id'];
        
        $this->log()->info('Telegram Chat ID response.', [ $text, $response ]);
        $this->replyWithMessage(compact('text'));

    }
}