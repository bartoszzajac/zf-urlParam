<?php
return [
    'view_helpers' => [
        'factories' => [
            View\Helper\urlParam::class => View\Helper\Factory\urlParamFactory::class,
        ],
        'aliases' => [
            'urlParam' => View\Helper\urlParam::class
        ],
    ],
];
