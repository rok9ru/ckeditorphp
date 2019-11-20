<?php

namespace CKEditorPHP\plugins;

use CKEditorPHP\CKEditorPHP;
use CKEditorPHP\core\AbstractPlugin;
use CKEditorPHP\core\PluginInterface;

class Image2Plugin extends AbstractPlugin implements PluginInterface {
	/**
	 * @var bool
	 */
	private $regRecommendConfig;

	public function __construct($regRecommendConfig = false) {
		$this->regRecommendConfig = $regRecommendConfig;
	}

	public function getName() {
		return 'image2';
	}

	public function onAdd(CKEditorPHP $editor) {
		if($this->regRecommendConfig){
			$editor->addToConfig('image2_prefillDimensions', false);
			$editor->addToConfig('image2_alignClasses', array('align-left', 'align-center', 'align-right'));
		}

		$editor->addToConfig('removePlugins', $editor->getFromConfig('removePlugins') . ' ,image');
	}
}