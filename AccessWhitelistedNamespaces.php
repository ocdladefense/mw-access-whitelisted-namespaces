<?php


# Autoload classes and files
$wgAutoloadClasses["AccessWhitelistedNamespaces\Access"] = __DIR__ . '/Access.php';


// Register Hooks
$wgHooks['UserGetRights'][] = 'AccessWhitelistedNamespaces\Access::onUserGetRights';
