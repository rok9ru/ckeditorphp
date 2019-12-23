<?php


namespace CKEditorPHP\core;


use CKEditorPHP\CKEditorPHP;

abstract class AbstractPlugin {
	/**
	 * @return string
	 */
	abstract public function getName();

	public function onAdd(CKEditorPHP $editor){
		return null;
	}
	public function onRemove(CKEditorPHP $editor){
		return null;
	}
}