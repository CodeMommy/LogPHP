<?php

/**
 * CodeMommy LogPHP
 * @author Candison November <www.kandisheng.com>
 */

declare(strict_types=1);

namespace CodeMommy\Test;

use CodeMommy\DevelopPHP\Library\Config;
use Exception;
use CodeMommy\DevelopPHP\PHPUnitBase;
use CodeMommy\LogPHP\Log;

/**
 * Class LogTest
 * @package CodeMommy\Test
 */
class LogTest extends PHPUnitBase
{
    /**
     * LogTest constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Test Construct
     * @throws Exception
     */
    public function testConstruct()
    {
        new Log();
        $this->assertTrue(true);
    }

    /**
     * Test Add Config
     * @throws Exception
     * @return void
     */
    public function testAddConfig()
    {
        $logName = rand(1, 100);
        $logFilePath = rand(1, 100);
        Log::addConfig($logName, $logFilePath);
        $config = Log::getConfig();
        $fileName = isset($config[$logName]) ? $config[$logName] : '';
        $this->assertEquals($fileName, $logFilePath);
    }

    /**
     * Test Get Config
     * @throws Exception
     * @return void
     */
    public function testGetConfig()
    {
        $logName = rand(1, 100);
        $logFilePath = rand(1, 100);
        Log::addConfig($logName, $logFilePath);
        $config = Log::getConfig();
        $fileName = isset($config[$logName]) ? $config[$logName] : '';
        $this->assertEquals($fileName, $logFilePath);
    }

    /**
     * Test Clear Config
     * @throws Exception
     * @return void
     */
    public function testClearConfig()
    {
        $logName = rand(1, 100);
        $logFilePath = rand(1, 100);
        Log::addConfig($logName, $logFilePath);
        $config = Log::getConfig();
        $fileName = isset($config[$logName]) ? $config[$logName] : '';
        $this->assertEquals($fileName, $logFilePath);
        Log::clearConfig();
        $config = Log::getConfig();
        $this->assertTrue(empty($config));
    }

    /**
     * Test Empty File Path
     * @throws Exception
     * @return void
     */
    public function testEmptyFilePath()
    {
        $logName = rand(1, 100);
        $logMessage = 'debug';
        $result = Log::debug($logName, $logMessage, array(), array());
        $this->assertFalse($result);
    }

    /**
     * Test File Not Exists
     * @throws Exception
     * @return void
     */
    public function testFileNotExists()
    {
        $logName = rand(1, 100);
        $logMessage = 'debug';
        $logFilePath = sprintf('%s/%s/CodeMommy/log.log', sys_get_temp_dir(), time());
        Log::addConfig($logName, $logFilePath);
        $result = Log::debug($logName, $logMessage, array(), array());
        $this->assertTrue($result);
        $content = file_get_contents($logFilePath);
        $contentCase = sprintf('/^(.*) %s.DEBUG: %s [] [](.*)/', $logName, $logMessage);
        $this->assertRegExp($contentCase, $content);
        @unlink($logFilePath);
    }

    /**
     * Test Debug
     * @throws Exception
     * @return void
     */
    public function testDebug()
    {
        $logName = rand(1, 100);
        $logMessage = 'debug';
        $logFilePath = tempnam(sys_get_temp_dir(), 'CodeMommy');
        Log::addConfig($logName, $logFilePath);
        $result = Log::debug($logName, $logMessage, array(), array());
        $this->assertTrue($result);
        $content = file_get_contents($logFilePath);
        $contentCase = sprintf('/^(.*) %s.DEBUG: %s [] [](.*)/', $logName, $logMessage);
        $this->assertRegExp($contentCase, $content);
        @unlink($logFilePath);
    }

    /**
     * Test Info
     * @throws Exception
     * @return void
     */
    public function testInfo()
    {
        $logName = rand(1, 100);
        $logMessage = 'info';
        $logFilePath = tempnam(sys_get_temp_dir(), 'CodeMommy');
        Log::addConfig($logName, $logFilePath);
        $result = Log::info($logName, $logMessage, array(), array());
        $this->assertTrue($result);
        $content = file_get_contents($logFilePath);
        $contentCase = sprintf('/^(.*) %s.INFO: %s [] [](.*)/', $logName, $logMessage);
        $this->assertRegExp($contentCase, $content);
        @unlink($logFilePath);
    }

    /**
     * Test Notice
     * @throws Exception
     * @return void
     */
    public function testNotice()
    {
        $logName = rand(1, 100);
        $logMessage = 'notice';
        $logFilePath = tempnam(sys_get_temp_dir(), 'CodeMommy');
        Log::addConfig($logName, $logFilePath);
        $result = Log::notice($logName, $logMessage, array(), array());
        $this->assertTrue($result);
        $content = file_get_contents($logFilePath);
        $contentCase = sprintf('/^(.*) %s.NOTICE: %s [] [](.*)/', $logName, $logMessage);
        $this->assertRegExp($contentCase, $content);
        @unlink($logFilePath);
    }

    /**
     * Test Warning
     * @throws Exception
     * @return void
     */
    public function testWarning()
    {
        $logName = rand(1, 100);
        $logMessage = 'warning';
        $logFilePath = tempnam(sys_get_temp_dir(), 'CodeMommy');
        Log::addConfig($logName, $logFilePath);
        $result = Log::warning($logName, $logMessage, array(), array());
        $this->assertTrue($result);
        $content = file_get_contents($logFilePath);
        $contentCase = sprintf('/^(.*) %s.WARNING: %s [] [](.*)/', $logName, $logMessage);
        $this->assertRegExp($contentCase, $content);
        @unlink($logFilePath);
    }

    /**
     * Test Error
     * @throws Exception
     * @return void
     */
    public function testError()
    {
        $logName = rand(1, 100);
        $logMessage = 'error';
        $logFilePath = tempnam(sys_get_temp_dir(), 'CodeMommy');
        Log::addConfig($logName, $logFilePath);
        $result = Log::error($logName, $logMessage, array(), array());
        $this->assertTrue($result);
        $content = file_get_contents($logFilePath);
        $contentCase = sprintf('/^(.*) %s.ERROR: %s [] [](.*)/', $logName, $logMessage);
        $this->assertRegExp($contentCase, $content);
        @unlink($logFilePath);
    }

    /**
     * Test Critical
     * @throws Exception
     * @return void
     */
    public function testCritical()
    {
        $logName = rand(1, 100);
        $logMessage = 'critical';
        $logFilePath = tempnam(sys_get_temp_dir(), 'CodeMommy');
        Log::addConfig($logName, $logFilePath);
        $result = Log::critical($logName, $logMessage, array(), array());
        $this->assertTrue($result);
        $content = file_get_contents($logFilePath);
        $contentCase = sprintf('/^(.*) %s.CRITICAL: %s [] [](.*)/', $logName, $logMessage);
        $this->assertRegExp($contentCase, $content);
        @unlink($logFilePath);
    }

    /**
     * Test Alert
     * @throws Exception
     * @return void
     */
    public function testAlert()
    {
        $logName = rand(1, 100);
        $logMessage = 'alert';
        $logFilePath = tempnam(sys_get_temp_dir(), 'CodeMommy');
        Log::addConfig($logName, $logFilePath);
        $result = Log::alert($logName, $logMessage, array(), array());
        $this->assertTrue($result);
        $content = file_get_contents($logFilePath);
        $contentCase = sprintf('/^(.*) %s.ALERT: %s [] [](.*)/', $logName, $logMessage);
        $this->assertRegExp($contentCase, $content);
        @unlink($logFilePath);
    }
}
