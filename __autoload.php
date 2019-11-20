<?php

$dir = __DIR__;

function CKEditorPHP_recursive_load_php($directory) {
	if (is_dir($directory)) {

		$scan = array_diff(scandir($directory, SCANDIR_SORT_NONE), array('..', '.'));
		//unset($scan[0], $scan[1]); //unset . and ..
		foreach ($scan as $file) {
			if (is_dir($directory . '/' . $file)) {
				CKEditorPHP_recursive_load_php($directory . '/' . $file);
			} else if (strpos($file, '.php') !== false) {
				include_once $directory . '/' . $file;
			}
		}
	}
}

require_once $dir . '/CKEditorPHP/CKEditorPHP.php';
require_once $dir . '/CKEditorPHP/core/Collection.php';
require_once $dir . '/CKEditorPHP/core/External.php';
require_once $dir . '/CKEditorPHP/core/ContentsCssCollection.php';
require_once $dir . '/CKEditorPHP/core/AbstractView.php';
require_once $dir . '/CKEditorPHP/core/AbstractPlugin.php';
require_once $dir . '/CKEditorPHP/core/PluginInterface.php';
require_once $dir . '/CKEditorPHP/core/PluginFactory.php';
require_once $dir . '/CKEditorPHP/view/JQueryView.php';

CKEditorPHP_recursive_load_php($dir . '/plugins');