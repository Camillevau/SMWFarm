<?php

if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'Not an entry point.' );
}
define( 'SMWFARM_VERSION', '0.1' );

// Registration of the extension credits, see Special:Version.
$wgExtensionCredits['semfarm'][] = array(
	'path' => __FILE__,
	'name' => 'Semantic MediaWiki Farm',
	'version' => SMWFARM_VERSION,
	'author' => array(
		'...'
		),
	'url' => 'https://semantic-mediawiki.org',
	'descriptionmsg' => 'smwfarm-desc'
);


$wikiConfigList['poc_config'] = array(
        'title'=>'POC',
        'prefix'=>'poc',
        'url'=>'https://poc.km.vaucelle.org',
        'dbname'=>'semwiki',
        'enableUploads'=>'true'
        );

$wikiConfigList['mowlie_config'] = array(
        'title'=>'Mowlie',
        'prefix'=>'mowlie',
        'url'=>'mowlie.km.vaucelle.org',
        'enableUploads'=>'true'
        );

$wikiConfigList['sisi_config'] = array(
        'title'=>'Princesse Sisi',
        'prefix'=>'sisi',
        'url'=>'sisi.km.vaucelle.org',
        'enableUploads'=>'true'
        );


#flag to spot if wiki exists
$wikiExists=0;

foreach ( $wikiConfigList as $wikiConfig ) {

   if($_SERVER["SERVER_NAME"]==$wikiConfig['url'])
   {
	$wikiExists =1;
	$wgSitename      = $wikiConfig['title'];
	$wgMetaNamespace = "Project";

	## The protocol and server name to use in fully-qualified URLs
	$wgServer           = "https://".$wikiConfig['url'];

	if($wikiConfig['enableUploads']==true)
	{
	   $wgEnableUploads  = true;
	   $wgUploadDirectory="{$IP}/custom/".$wikiConfig['prefix']."_uploads";
	   $wgUploadPath       = "$wgScriptPath/custom/".$wikiConfig['prefix']."_uploads";
	   $wgUseImageMagick = true;
	}
	## Database settings
	if(is_null($wikiConfig['dbname']))
	{
	   $wgDBname = $wikiConfig['prefix']."_wiki";
	}
	else
	{
	   $wgDBname = $wikiConfig['dbname'];
	}
   }
}
if($wikiExists ==0)
{
	echo "This wiki is not available. Check configuration.";
	exit(0);
}

