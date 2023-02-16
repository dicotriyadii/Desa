<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitfa12da0ffbc257fc59ade7b51e8ce70d
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitfa12da0ffbc257fc59ade7b51e8ce70d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitfa12da0ffbc257fc59ade7b51e8ce70d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitfa12da0ffbc257fc59ade7b51e8ce70d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
