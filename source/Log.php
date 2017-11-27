<?php

/**
 * CodeMommy LogPHP
 * @author Candison November <www.kandisheng.com>
 */

namespace CodeMommy\LogPHP;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

/**
 * Class Log
 * @package CodeMommy\LogPHP
 */
class Log
{
    private $logFile = null;
    private $logName = null;

    /**
     * Log constructor.
     *
     * @param string $logName
     * @param string $logFile
     */
    public function __construct($logName = '', $logFile = '')
    {
        $this->logFile = $logFile;
        $this->logName = $logName;
    }

    /**
     * Debug
     * @param string $message
     * @param array $array
     */
    public function debug($message = '', $array = array())
    {
        $log = new Logger($this->logName);
        $log->pushHandler(new StreamHandler($this->logFile, Logger::DEBUG));
        $log->addDebug($message, $array);
    }

    /**
     * Info
     * @param string $message
     * @param array $array
     */
    public function info($message = '', $array = array())
    {
        $log = new Logger($this->logName);
        $log->pushHandler(new StreamHandler($this->logFile, Logger::INFO));
        $log->addInfo($message, $array);
    }

    /**
     * Notice
     * @param string $message
     * @param array $array
     */
    public function notice($message = '', $array = array())
    {
        $log = new Logger($this->logName);
        $log->pushHandler(new StreamHandler($this->logFile, Logger::NOTICE));
        $log->addNotice($message, $array);
    }

    /**
     * Warning
     * @param string $message
     * @param array $array
     */
    public function warning($message = '', $array = array())
    {
        $log = new Logger($this->logName);
        $log->pushHandler(new StreamHandler($this->logFile, Logger::WARNING));
        $log->addWarning($message, $array);
    }

    /**
     * Error
     * @param string $message
     * @param array $array
     */
    public function error($message = '', $array = array())
    {
        $log = new Logger($this->logName);
        $log->pushHandler(new StreamHandler($this->logFile, Logger::ERROR));
        $log->addError($message, $array);
    }

    /**
     * Critical
     * @param string $message
     * @param array $array
     */
    public function critical($message = '', $array = array())
    {
        $log = new Logger($this->logName);
        $log->pushHandler(new StreamHandler($this->logFile, Logger::CRITICAL));
        $log->addCritical($message, $array);
    }

    /**
     * Alert
     * @param string $message
     * @param array $array
     */
    public function alert($message = '', $array = array())
    {
        $log = new Logger($this->logName);
        $log->pushHandler(new StreamHandler($this->logFile, Logger::ALERT));
        $log->addAlert($message, $array);
    }
}