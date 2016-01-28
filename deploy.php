<?php
/*
 * Deploy script for site/main
 *
 * @copyright Léo Lam at Innovate Techonologies
 * 
 * Modified by Maartje for Zalos Design
 */

date_default_timezone_set('Europe/Paris');
setlocale(LC_CTYPE, "en_GB.UTF-8");

if (empty($_GET['token']) || $_GET['token'] !== 'XJxAsi9PQwWi2WwCpsRu4QXWn5onck') {
    die;
}

$oldRevision = trim(shell_exec('git rev-parse --short HEAD'));
$output = shell_exec('git reset --hard && git pull --rebase');
$newRevision = trim(shell_exec('git rev-parse --short HEAD'));
$branchName = trim(shell_exec('git rev-parse --abbrev-ref HEAD'));
if ($oldRevision === $newRevision) {
    exit;
}
