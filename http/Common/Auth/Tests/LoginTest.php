<?php

namespace Http\Common\Auth\Tests;

class LoginTest extends _TestCase
{
    public function test_subscriber(): void
    {
        $this->sendRequest(
            method: 'POST',
            path: 'login',
            body:[
                'email' => 'subscriber@local.host',
                'password' => 'test123'
            ]
        );
    }
}
