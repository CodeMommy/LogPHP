<?php

/**
 * CodeMommy LogPHP
 * @author Candison November <www.kandisheng.com>
 */

require_once('library/Autoload.php');

use CodeMommy\LogPHP\Library\Autoload;

$autoloaDirectory = array(
    'library' => 'CodeMommy\\LogPHP\\Library',
    'interface' => 'CodeMommy\\LogPHP',
    'class' => 'CodeMommy\\LogPHP'
);

Autoload::directory($autoloaDirectory);
