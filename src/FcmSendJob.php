<?php


namespace LaraDevs\Fcm;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FcmSendJob  implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $message;
    private $recipients;
    private $urlAction;

    /**
     * Create a new job instance.
     *
     * @param string $message
     * @param array $recipients
     * @param string $urlAction
     */
    public function __construct(string $message, array $recipients, string $urlAction='')
    {
        $this->message=$message;
        $this->recipients=$recipients;
        $this->urlAction=$urlAction;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        fcm()
            ->to($this->recipients) // $recipients must an array
            ->priority('high')
            ->timeToLive(0)
            ->notification([
                'title' => config('app.name'),
                'body' => $this->message,
                'icon' => config('notification-fcm.server_icon_app'),
                'click_action'=>$this->urlAction
            ])
            ->send();
    }
}