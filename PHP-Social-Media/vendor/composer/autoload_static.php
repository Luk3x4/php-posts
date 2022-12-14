<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit10b7822f7cbb0be97ec76f71ca00cc5c
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Lukas\\PhpSocialMedia\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Lukas\\PhpSocialMedia\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit10b7822f7cbb0be97ec76f71ca00cc5c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit10b7822f7cbb0be97ec76f71ca00cc5c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit10b7822f7cbb0be97ec76f71ca00cc5c::$classMap;

        }, null, ClassLoader::class);
    }
}
