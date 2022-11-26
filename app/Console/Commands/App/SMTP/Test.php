<?php

namespace App\Console\Commands\App\SMTP;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'smtp:test {to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a test email.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Mail::raw('This email was sent to test the SMTP server.', function ($message) {
                $message->to($this->argument('to'))->subject('Test email');
            });

            $this->output->success('Email was sent successfully!');
        } catch (\Exception $error) {
            $this->output->warning($error->getMessage());
        }
    }
}
