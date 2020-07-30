<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Facebook Token
    |--------------------------------------------------------------------------
    |
    | Your Facebook application you received after creating
    | the messenger page / application on Facebook.
    |
    */
    'token' => env('FACEBOOK_TOKEN'),

    /*
    |--------------------------------------------------------------------------
    | Facebook App Secret
    |--------------------------------------------------------------------------
    |
    | Your Facebook application secret, which is used to verify
    | incoming requests from Facebook.
    |
    */
    'app_secret' => env('FACEBOOK_APP_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Facebook Verification
    |--------------------------------------------------------------------------
    |
    | Your Facebook verification token, used to validate the webhooks.
    |
    */
    'verification' => env('FACEBOOK_VERIFICATION'),






    /*
    |--------------------------------------------------------------------------
    | Facebook Start Button Payload
    |--------------------------------------------------------------------------
    |
    | The payload which is sent when the Get Started Button is clicked.
    |
    */
    'start_button_payload' => 'GET_STARTED',

    /*
    |--------------------------------------------------------------------------
    | Facebook Greeting Text
    |--------------------------------------------------------------------------
    |
    | Your Facebook Greeting Text which will be shown on your message start screen.
    |
    */
    'greeting_text' => [
        'greeting' => [


            [
        
            
                'locale' => 'default',
                'text' => ' ! {{user_full_name}} مرحبا بك  ',
            ],
            [
                'locale' => 'en_US',
                'text' => 'Timeless apparel for the masses.',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Facebook Persistent Menu
    |--------------------------------------------------------------------------
    |
    | Example items for your persistent Facebook menu.
    | See https://developers.facebook.com/docs/messenger-platform/reference/messenger-profile-api/persistent-menu/#example
    |
    */
    'persistent_menu' => [
        [
            'locale' => 'default',
            'composer_input_disabled' => 'false',
            'call_to_actions' => [
             
                        [
                            'title' => ' 🛍 منتجاتنا ',
                            'type' => 'postback',
                            'payload' => 'show_products',
                        ],
                    
                
                        [
                            'title' => ' 🛒 طلبياتي ',
                            'type' => 'postback',
                            'payload' => 'show_commandes',
                        ],
                        [
                            'title' => ' 👨‍🏫 شرح طريقة الشراء  ',
                            'type' => 'postback',
                            'payload' => 'steps',
                        ],
                      
                      
                      
                      
                      
                        [
                            'title' => ' 💬 استفسار ',
                            'type' => 'web_url',
                            'url' => 'https://www.messenger.com/t/merahi.adjalile',
                            'webview_height_ratio' =>'full'
                        ],



            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Facebook Domain Whitelist
    |--------------------------------------------------------------------------
    |
    | In order to use domains you need to whitelist them
    |
    */
    'whitelisted_domains' => [
        'https://petersfancyapparel.com',
    ],
];
