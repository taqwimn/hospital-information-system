<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0c92bb18b862a658c7a3eccf89de530f
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'R' => 
        array (
            'Ramsey\\Uuid\\' => 12,
        ),
        'M' => 
        array (
            'Moontoast\\Math\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Ramsey\\Uuid\\' => 
        array (
            0 => __DIR__ . '/..' . '/ramsey/uuid/src',
        ),
        'Moontoast\\Math\\' => 
        array (
            0 => __DIR__ . '/..' . '/moontoast/math/src/Moontoast/Math',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0c92bb18b862a658c7a3eccf89de530f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0c92bb18b862a658c7a3eccf89de530f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
