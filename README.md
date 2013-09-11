SMWFarm
=======

Farming SemanticMediaWiki

TOCOME : Full install script for a clean mediawiki (automate installation of all MediaWiki extensions and dependencies)

Copy and custom your own configuration.

cp $yourSMWikiPath/extensions/SMWFarm/SMWFarmLocalSettings.sample.php$yourSMWikiPath/extensions/SMWFarm/SMWFarmLocalSettings.php

Custom your favorite extensions and global settings to be set globaly for the whole farm

Configure each of your wikis

$wikiConfigList['instance1_config'] = array(
        'title'=>'My First Wiki Instance',
        'prefix'=>'firstInstance',
        'url'=>'firstinstance.farm.domain.org',
        'enableUploads'=>'true' #specific directories must exists in farm_uploads/ directory
        );

TODO : specify third file to complex wiki configuration overide

TODO : CREATION SCRIPT : createWiki.sh
- automate database creation / clone
- automate uploads directory creation / rights
- generate the text-config above to be included in SMWFarmLocalSettings.php



Edit LocalSettings.php :

# Add more configuration options below.

require_once( "$IP/extensions/SMWFarm/SMWFarmLocalSettings.php" );
require_once( "$IP/extensions/SMWFarm/SMWFarm.php" );

require_once( "$IP/extensions/SemanticBundle/SemanticBundleSettings.php" );
require_once( "$IP/extensions/SemanticBundle/SemanticBundle.php" );
