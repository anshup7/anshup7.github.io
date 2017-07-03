<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf62a7f1c8dae957efcf84ef81d3fbe9e
{
    public static $files = array (
        '34122c0574b76bf21c9a8db62b5b9cf3' => __DIR__ . '/..' . '/cakephp/chronos/src/carbon_compat.php',
        'c720f792236cd163ece8049879166850' => __DIR__ . '/..' . '/cakephp/cakephp/src/Core/functions.php',
        'ede59e3a405fb689cd1cebb7bb1db3fb' => __DIR__ . '/..' . '/cakephp/cakephp/src/Collection/functions.php',
        '90236b492da7ca2983a2ad6e33e4152e' => __DIR__ . '/..' . '/cakephp/cakephp/src/I18n/functions.php',
        'b1fc73705e1bec51cd2b20a32cf1c60a' => __DIR__ . '/..' . '/cakephp/cakephp/src/Utility/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'Z' => 
        array (
            'Zend\\Diactoros\\' => 15,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Http\\Message\\' => 17,
        ),
        'C' => 
        array (
            'Cake\\Chronos\\' => 13,
            'Cake\\' => 5,
        ),
        'A' => 
        array (
            'Aura\\Intl\\_Config\\' => 18,
            'Ajax\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Zend\\Diactoros\\' => 
        array (
            0 => __DIR__ . '/..' . '/zendframework/zend-diactoros/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Psr\\Http\\Message\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/http-message/src',
        ),
        'Cake\\Chronos\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/chronos/src',
        ),
        'Cake\\' => 
        array (
            0 => __DIR__ . '/..' . '/cakephp/cakephp/src',
        ),
        'Aura\\Intl\\_Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/aura/intl/config',
        ),
        'Ajax\\' => 
        array (
            0 => __DIR__ . '/..' . '/dereuromark/cakephp-ajax/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'A' => 
        array (
            'Aura\\Intl' => 
            array (
                0 => __DIR__ . '/..' . '/aura/intl/src',
            ),
            'Aura\\Composer\\' => 
            array (
                0 => __DIR__ . '/..' . '/aura/installer-default/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf62a7f1c8dae957efcf84ef81d3fbe9e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf62a7f1c8dae957efcf84ef81d3fbe9e::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitf62a7f1c8dae957efcf84ef81d3fbe9e::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
