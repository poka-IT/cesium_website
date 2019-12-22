<?php

include('cesiumVersions.php');

define('FUNDING_PUBKEY', 'CitdnuQgZ45tNFCagay7Wh12gwwHM8VLej1sWmfHWnQX');
define('FUNDING_TARGET', '100');

$legalNotice = 
	[
		'editor' => 'Axiom-Team', 
		'publisher' => 'Axiom-Team', 
		'host' => 'P2Legal'
	];



// Trouver une façon de définir $rootURL sans faire ça :

if ($_SERVER['SERVER_NAME'] == 'localhost') {
	
	$rootURL = '/www/cesium-website';
	
} else {
	
	$rootURL = '';
	
}

/* ====== i18n ====== */

function checkAvailableLanguages ($langList) {
	
	foreach ($langList as $isoCode => $l) {
		
		$loc = setlocale(LC_ALL, $l['folder'], ($l['folder'] . '.utf8'));
		
		if ($loc === false) {
			
			unset($langList[$isoCode]);
				
		} else {
			
			$langList[$isoCode]['localeCode'] = $loc;
		}
	}
	
	return $langList;
}

$availableLanguages = 
	[
	 'fr' => [
		 'name' => 'français', 
		 'folder' => 'fr_FR'
		 ], 
	 'en' => [
		 'name' => 'english', 
		 'folder' => 'en_GB'
		 ], 
	 'es' => [
		 'name' => 'español', 
		 'folder' => 'es_ES'
		 ], 
	 'va' => [
		 'name' => 'valyrio', 
		 'folder' => 'en_US'
		 ], 
	/*
	 'it' => [
		 'name' => 'italiano', 
		 'folder' => 'it_IT'
		 ], 
	*/
	];

$availableLanguages = checkAvailableLanguages($availableLanguages);

//echo '<pre>'; print_r($availableLanguages); echo '</pre>';
		
define('DEFAULT_LANG', 'fr'); 

include('inc/lang.php');

$textDomains = 
	[
	 'menu', 
	 'home', 
	 'features', 
	 'download', 
	 'tuto'
	];

bindTextDomains($textDomains);

/* ====== /i18n ====== */




include('inc/functions.php');

include('inc/display.php');


define('MOD_REWRITE', 'on');
define('FUNDING_ALT', false); 
