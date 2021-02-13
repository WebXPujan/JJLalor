<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8d2fda31a36d2c54d6e969bf17a8a709
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8d2fda31a36d2c54d6e969bf17a8a709::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8d2fda31a36d2c54d6e969bf17a8a709::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
