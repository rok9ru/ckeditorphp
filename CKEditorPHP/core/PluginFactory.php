<?php


namespace CKEditorPHP\core;


class PluginFactory extends AbstractPlugin implements PluginInterface {


	public static function factory($name) {
		return new static($name);
	}

	private function __construct($name) {
		$this->name = $name;
	}

	protected $name;

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 *
	 * @return PluginFactory
	 */
	public function setName($name) {
		$this->name = $name;

		return $this;
	}
}