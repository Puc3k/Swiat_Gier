<?php

namespace App\Console\Commands\Steam;

use Illuminate\Console\Command;
use Illuminate\Http\Client\Factory;
use Illuminate\Support\Facades\Http;

class UpdateGame extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //protected $signature = 'steam:update-game {game?}';
    //protected $signature = 'steam:update-game {game=FIFA}';
    protected $signature = 'steam:update-game {game}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    private Factory $httpClient;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Factory $httpClient)
    {
        parent::__construct();
        $this->httpClient = $httpClient;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {


        return 0;
    }

}
