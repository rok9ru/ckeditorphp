<?php
namespace CKEditorPHP\plugins;

use CKEditorPHP\core\AbstractPlugin;
use CKEditorPHP\core\PluginInterface;

class PastefromwordPlugin extends AbstractPlugin implements PluginInterface {
	public function getName() {
		return 'pastefromword';
	}
}