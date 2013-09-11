<?php

if ( !defined( 'MEDIAWIKI' ) ) {
        die( 'Not an entry point.' );
}


# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = "modern";

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
#$wgLogo             = "$wgStylePath/common/images/wiki.png";

## UPO means: this is also a user preference option
$wgEnableEmail      = true;
$wgEnableUserEmail  = true; # UPO

$wgEmergencyContact = "admin@domain.org";
$wgPasswordSender   = "admin@domain.org";

$wgEnotifUserTalk      = true; # UPO
$wgEnotifWatchlist     = true; # UPO
$wgEmailAuthentication = true;

## Database settings
$wgDBtype           = "mysql";
$wgDBserver         = "localhost";
$wgDBuser           = "root";
#$wgDBname           = "";
$wgDBpassword       = "";

# MySQL specific settings
$wgDBprefix         = "mw_";


# Permissions
$wgGroupPermissions['*']['createaccount']    = true;
$wgGroupPermissions['*']['read']    = true;
$wgGroupPermissions['*']['edit'] = false;

$wgWhitelistRead = array( "Accueil", "Special:UserLogin", "Special:UserLogout", "Special:PasswordReset", "MediaWiki:Common.css" );


##########################################
# Semantic Mediawiki configuration options below.

include_once("$IP/extensions/ParserFunctions/ParserFunctions.php");

require_once( "$IP/extensions/Interwiki/Interwiki.php" );
$wgGroupPermissions['sysop']['interwiki'] = true;
$wgGroupPermissions['user']['interwiki'] = true;
#require_once( "$IP/extensions/SemanticBundle/SemanticBundleSettings.php" );
#require_once( "$IP/extensions/SemanticBundle/SemanticBundle.php" );

require_once("$IP/extensions/GraphViz/GraphViz.php");
$wgGraphVizSettings->execPath = "/usr/bin/";
$wgGraphVizSettings->info = false;
$wgGraphVizSettings->install = false;

#$srfgFormats[] = 'graph';
#$srfgFormats[] = 'jqplotseries';

#Conf DrillDown TagCloud
$sdgFiltersSmallestFontSize=10;
$sdgFiltersLargestFontSize=20;
$sdgShowCategoriesAsTabs = true;


##########################################
# Semantic Mediawiki Farm configuration options below.

$wikiConfigList['instance1_config'] = array(
        'title'=>'My First Wiki Instance',
        'prefix'=>'firstInstance',
        'url'=>'firstinstance.farm.domain.org',
        'enableUploads'=>'true'
        );

