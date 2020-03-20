<?php

namespace LaraDevs\Fcm;

use PHPUnit\Framework\TestCase;

class FCMTest extends TestCase
{
    /** @test */
    function test_unit_test()
    {
        $this->assertTrue(true);
    }

    /** @test */
    function test_fcm_send()
    {
        require dirname(__FILE__).'/../vendor/autoload.php';
        $config = require dirname(__FILE__).'/../resources/config/notification-fcm.php';

        $notification = new Fcm($config['server_key'],$config['server_endpoint']);
        $result=$notification->to(['YOUR_RECIPIENT']) // $recipients must an array
            ->priority('high')
            ->timeToLive(0)
            ->notification([
                'title' => 'Test',
                'body' => 'Body Test',
                'icon' => $config['server_icon_app'],
                'click_action'=>''
            ])
            ->send();
        $this->assertTrue($result===null);//FOR TESTER CHANGE CONDITIONAL $result!===null
    }

    /** @test */
    function test_load_config(){
        $this->assertTrue(is_array(require dirname(__FILE__).'/../resources/config/notification-fcm.php'));
    }
}
