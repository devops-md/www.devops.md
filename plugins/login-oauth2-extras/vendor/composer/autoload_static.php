<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a54b6a2474c6ba3c81f690575f70940
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Wohali\\OAuth2\\Client\\' => 21,
        ),
        'T' => 
        array (
            'TheNetworg\\OAuth2\\Client\\' => 25,
        ),
        'O' => 
        array (
            'Omines\\OAuth2\\Client\\' => 21,
        ),
        'M' => 
        array (
            'Mrjoops\\OAuth2\\Client\\' => 22,
        ),
        'G' => 
        array (
            'Gravure\\Patreon\\Oauth\\' => 22,
            'Grav\\Plugin\\Login\\OAuth2\\' => 25,
        ),
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
        'D' => 
        array (
            'Depotwarehouse\\OAuth2\\Client\\Twitch\\' => 36,
        ),
        'A' => 
        array (
            'AdamPaterson\\OAuth2\\Client\\' => 27,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Wohali\\OAuth2\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/wohali/oauth2-discord-new/src',
        ),
        'TheNetworg\\OAuth2\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/thenetworg/oauth2-azure/src',
        ),
        'Omines\\OAuth2\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/omines/oauth2-gitlab/src',
        ),
        'Mrjoops\\OAuth2\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/mrjoops/oauth2-jira/src',
        ),
        'Gravure\\Patreon\\Oauth\\' => 
        array (
            0 => __DIR__ . '/..' . '/gravure/oauth2-patreon/src',
        ),
        'Grav\\Plugin\\Login\\OAuth2\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
        'Depotwarehouse\\OAuth2\\Client\\Twitch\\' => 
        array (
            0 => __DIR__ . '/..' . '/depotwarehouse/oauth2-twitch/src',
        ),
        'AdamPaterson\\OAuth2\\Client\\' => 
        array (
            0 => __DIR__ . '/..' . '/adam-paterson/oauth2-slack/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a54b6a2474c6ba3c81f690575f70940::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a54b6a2474c6ba3c81f690575f70940::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}