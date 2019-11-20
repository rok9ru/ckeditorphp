<?php
namespace CKEditorPHP\plugins;

use CKEditorPHP\core\AbstractPlugin;
use CKEditorPHP\core\PluginInterface;

class CopyformattingPlugin extends AbstractPlugin implements PluginInterface {
	public function getName() {
		return 'copyformatting';
	}
}