<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit16b5e754ede0746a2bd7e15bcb6a4e37
{
    public static $prefixLengthsPsr4 = array (
        'b' => 
        array (
            'blog\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'blog\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit16b5e754ede0746a2bd7e15bcb6a4e37::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit16b5e754ede0746a2bd7e15bcb6a4e37::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit16b5e754ede0746a2bd7e15bcb6a4e37::$classMap;

        }, null, ClassLoader::class);
    }
}
