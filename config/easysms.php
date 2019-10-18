<?php

return [
    // HTTP 请求的超市时间(秒)
    'timeout' => 5.0,

    // 默认发送匹配置
    'default' => [
        // 网关调用策略,默认:顺序调用
        'strategy' => \OverTrue\EasySms\Strategies\OrderStrategy::class,

        // 默认可用的发送网关
        'gateways' => [
            'yunpian',
        ],
    ],
    // 可以的网关配置
    'gateways' => [
        'errorlog' => [
            'file' => '/tmp/easy-sms.log',
        ],
        'yunpian' => [
            'api_key' => env('YUNPIAN_API_KEY')
        ],
    ],
];
