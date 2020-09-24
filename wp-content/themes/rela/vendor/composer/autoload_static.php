<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit640c1fd88500109f17f58edddf7e6c2f
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Appsero\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Appsero\\' => 
        array (
            0 => __DIR__ . '/..' . '/appsero/client/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit640c1fd88500109f17f58edddf7e6c2f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit640c1fd88500109f17f58edddf7e6c2f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
