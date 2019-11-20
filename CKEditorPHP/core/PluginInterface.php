<?php


namespace CKEditorPHP\core;


use CKEditorPHP\CKEditorPHP;

interface PluginInterface {
	/**
	 * @return string
	 */
	public function getName();

	public function onAdd(CKEditorPHP $editor);
	public function onRemove(CKEditorPHP $editor);
}