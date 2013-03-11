<?php
/**
 * Nohex Eix-style standard phar bootstrap.
 *
 * This script lets PHP know how to find the classes in this phar.
 *
 * @author Max Noé <max@nohex.com>
 * @copyright Nohex 2012
 */

$pharId = uniqid();
Phar::mapPhar($pharId);

require_once "phar://${pharId}/bootstrap.php";

__HALT_COMPILER();