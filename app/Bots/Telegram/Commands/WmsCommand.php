<?php

namespace App\Bots\Telegram\Commands;

use Telegram\Bot\Commands\Command;
use App\Supports\Traits\Logs\Telegram as TelegramLog;

/**
 * Class HelpCommand.
 */
class WmsCommand extends Command
{
    use TelegramLog;

    /**
     * @var string Command Name
     */
    protected $name = 'wms';

    /**
     * @var array Command Aliases
     */
    protected $aliases = ['WMS'];

    /**
     * @var string Command Description
     */
    protected $description = 'About WMS.';

    /**
     * {@inheritdoc}
     */
    public function handle()
    
    {
        $response = $this->getUpdate();
        $text = 'WMS URL: ';
        $text .= env('WMS_URL').chr(10);
                
        $this->log()->info('Telegram WMS response.', [ $response ]);
        $this->replyWithMessage(compact('text'));

    }
}