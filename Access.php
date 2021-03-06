<?php

namespace AccessWhitelistedNamespaces;

class Access {

    public static function onUserGetRights( \User $user, array &$aRights ) {

        if(self::hasAccess()) $aRights[] = "read";
	        
        return true;
    }

    public static function hasAccess() {

        global $wgWhitelistedNamespaces, $wgExtraNamespaces, $wgRequest;

        // Global "$wgTitle" is deprecated, so I am getting the title as a string, from the request.
        $title = $wgRequest->getVal("title");

        $standardNamespaces = array(0 => null, -1 => "Special");

        $allNamespaces = $standardNamespaces + $wgExtraNamespaces;

        $namespace = explode(":", $title)[0];

        $namespaceInt = array_search($namespace, $allNamespaces);
    
        return in_array($namespaceInt, $wgWhitelistedNamespaces);
    }
}