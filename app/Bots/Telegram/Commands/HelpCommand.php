<?php

namespace App\Bots\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Supports\Traits\Logs\Telegram as TelegramLog;

/**
 * Class HelpCommand.
 */
class HelpCommand extends Command
{
    use TelegramLog;

    /**
     * @var string Command Name
     */
    protected $name = 'help';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['about'];

    /**
     * @var string Command Description
     */
    protected $description = 'About the Bot.';

    /**
     * {@inheritdoc}
     */
    public function handle()
    
    {
        $response = $this->getUpdate();
        $text = 'Hello '.$response->getMessage()['from']['first_name'].' !'.chr(10).chr(10);
        $text .= 'I\'m WMS Telegram Bot for sending notification.'.chr(10).chr(10);
        $text .= 'For further information, please contact:'.chr(10);
        $text .= 'Nelson@ysit.com.tw'.chr(10);
        
        $this->log()->info('Telegram Help response.', [ $response ]);
        $this->replyWithMessage(compact('text'));

    }
}