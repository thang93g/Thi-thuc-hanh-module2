<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite156128ee11f3a0b049becc957684157
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Prd\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Prd\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite156128ee11f3a0b049becc957684157::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite156128ee11f3a0b049becc957684157::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
