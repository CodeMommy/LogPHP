<?php

/**
 * CodeMommy LogPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\LogPHP;

/**
 * Class Log
 * @package CodeMommy\LogPHP
 */
class Log implements LogInterface
{
    /**
     * @var array
     */
    private static $config = array();

    /**
     * Log constructor.
     */
    public function __construct()
    {
    }

    /**
     * Write
     * @param string $name
     * @param string $type
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    private static function write($name = '', $type = '', $message = '', $data = array(), $other = array())
    {
        $filePath = isset(self::$config[$name]) ? self::$config[$name] : '';
        if (empty($filePath)) {
            return false;
        }
        $directory = dirname($filePath);
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
        $string = sprintf(
            '[%s] %s.%s: %s %s %s%s',
            date('Y-m-d H:i:s'),
            $name,
            $type,
            $message,
            json_encode($data),
            json_encode($other),
            PHP_EOL
        );
        file_put_contents($filePath, $string, FILE_APPEND);
        return true;
    }

    /**
     * Add Config
     * @param string $name
     * @param string $filePath
     * @return bool
     */
    public static function addConfig($name = '', $filePath = 'log.log')
    {
        self::$config[$name] = $filePath;
        return true;
    }

    /**
     * Get Config
     * @return array
     */
    public static function getConfig()
    {
        return self::$config;
    }

    /**
     * Clear Config
     * @return bool
     */
    public static function clearConfig()
    {
        self::$config = array();
        return true;
    }

    /**
     * Debug
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function debug($name = '', $message = '', $data = array(), $other = array())
    {
        return self::write($name, 'DEBUG', $message, $data, $other);
    }

    /**
     * Info
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function info($name = '', $message = '', $data = array(), $other = array())
    {
        return self::write($name, 'INFO', $message, $data, $other);
    }

    /**
     * Notice
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function notice($name = '', $message = '', $data = array(), $other = array())
    {
        return self::write($name, 'NOTICE', $message, $data, $other);
    }

    /**
     * Warning
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function warning($name = '', $message = '', $data = array(), $other = array())
    {
        return self::write($name, 'WARNING', $message, $data, $other);
    }

    /**
     * Error
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function error($name = '', $message = '', $data = array(), $other = array())
    {
        return self::write($name, 'ERROR', $message, $data, $other);
    }

    /**
     * Critical
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function critical($name = '', $message = '', $data = array(), $other = array())
    {
        return self::write($name, 'CRITICAL', $message, $data, $other);
    }

    /**
     * Alert
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function alert($name = '', $message = '', $data = array(), $other = array())
    {
        return self::write($name, 'ALERT', $message, $data, $other);
    }
}
