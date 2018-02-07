<?php

/**
 * CodeMommy LogPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\LogPHP;

/**
 * Class LogInterface
 * @package CodeMommy\LogPHP
 */
interface LogInterface
{
    /**
     * Log constructor.
     */
    public function __construct();

    /**
     * Add Config
     * @param string $name
     * @param string $filePath
     * @return bool
     */
    public static function addConfig($name = '', $filePath = 'log.log');

    /**
     * Get Config
     * @return array
     */
    public static function getConfig();

    /**
     * Clear Config
     * @return bool
     */
    public static function clearConfig();

    /**
     * Debug
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function debug($name = '', $message = '', $data = array(), $other = array());

    /**
     * Info
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function info($name = '', $message = '', $data = array(), $other = array());

    /**
     * Notice
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function notice($name = '', $message = '', $data = array(), $other = array());

    /**
     * Warning
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function warning($name = '', $message = '', $data = array(), $other = array());

    /**
     * Error
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function error($name = '', $message = '', $data = array(), $other = array());

    /**
     * Critical
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function critical($name = '', $message = '', $data = array(), $other = array());

    /**
     * Alert
     * @param string $name
     * @param string $message
     * @param array $data
     * @param array $other
     * @return bool
     */
    public static function alert($name = '', $message = '', $data = array(), $other = array());
}
