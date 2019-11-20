<?php


namespace CKEditorPHP\core;


use CKEditorPHP\CKEditorPHP;

abstract class AbstractPlugin {

	public function onAdd(CKEditorPHP $editor){
		return null;
	}
	public function onRemove(CKEditorPHP $editor){
		return null;
	}
}