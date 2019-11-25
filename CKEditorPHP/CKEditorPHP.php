<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 22.06.2017
 * Time: 1:51
 */

namespace CKEditorPHP;


use CKEditorPHP\core\AbstractView;
use CKEditorPHP\core\Collection;
use CKEditorPHP\core\ContentsCssCollection;
use CKEditorPHP\core\External;
use CKEditorPHP\core\PluginInterface;
use CKEditorPHP\view\JQueryView;


class CKEditorPHP {
	private $extraPlugins;
	private $selector;
	private $external;
	private $view;
	private $config = array('allowedContent' => false);
	private $lines = array();
	/**
	 * @var Collection
	 */
	private $contentsCss;

	/**
	 * CKEditorPHP constructor.
	 *
	 * @param string       $selector
	 * @param AbstractView $view
	 */
	public function __construct($selector, AbstractView $view = null) {
		$this->selector     = $selector;
		$this->view         = $view ?: new JQueryView();
		$this->extraPlugins = new Collection();
		$this->contentsCss  = new ContentsCssCollection();
		$this->external     = new External();

	}

	public function addLine($line) {
		$this->lines[] = $line;
	}

	/**
	 * @param $pluginName
	 *
	 * @return $this
	 */
	public function addExtraPlugin($pluginName) {

		if ($pluginName instanceof PluginInterface) {
			$plugin = $pluginName;
		} elseif(isset($this->extraPluginsList[$pluginName])) {
			$plugin = new $this->extraPluginsList[$pluginName];
		}else{
			throw new \RuntimeException('Invalid extra plugin!');
		}

		$this->getExtraPlugins()->add($plugin->getName(), $plugin->getName());
		$plugin->onAdd($this);

		return $this;
	}

	public function removeExtraPlugin($name) {
		$this->getExtraPlugins()->del($name);
	}


	/**
	 * @return Collection
	 */
	public function getExtraPlugins() {
		return $this->extraPlugins;
	}

	/**
	 * @return array
	 */
	public function getConfig() {

		return array_merge($this->config, array(
			'extraPlugins' => $this->getExtraPlugins(),
			'externals'    => $this->getExternal(),
			'contentsCss'  => $this->getContentsCss(),
			'lines'        => $this->lines
		));
	}

	/**
	 * @return mixed
	 */
	public function getSelector() {
		return $this->selector;
	}

	/**
	 * @param mixed $selector
	 *
	 * @return $this
	 */
	public function setSelector($selector) {
		$this->selector = $selector;

		return $this;
	}


	public function enableAllowedContent() {
		$this->config['allowedContent'] = true;

		return $this;
	}

	public function disableAllowedContent() {
		$this->config['allowedContent'] = false;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAllowedContent() {
		return $this->config['allowedContent'];
	}

	/**
	 * @param $key
	 * @param $value
	 *
	 * @return CKEditorPHP
	 * @internal param array $config
	 *
	 */
	public function addToConfig($key, $value) {
		$this->config[$key] = $value;

		return $this;
	}

	/**
	 * @param      $key
	 * @param null $default
	 *
	 * @return mixed|null
	 */
	public function getFromConfig($key, $default = null) {
		return isset($this->config[$key]) ? $this->config[$key] : $default;
	}

	public function __toString() {
		return (string) $this->getView()
			->setData($this->getConfig())
			->setSelector($this->getSelector());
	}

	/**
	 * @param External $external
	 *
	 * @return CKEditorPHP
	 */
	public function setExternal($external) {
		$this->external = $external;

		return $this;
	}

	/**
	 * @return External
	 */
	public function getExternal() {
		return $this->external;
	}

	/**
	 * @param mixed $view
	 *
	 * @return CKEditorPHP
	 */
	public function setView($view) {
		$this->view = $view;

		return $this;
	}

	/**
	 * @return AbstractView
	 */
	public function getView() {
		return $this->view;
	}

	/**
	 * @return Collection
	 */
	public function getContentsCss() {
		return $this->contentsCss;
	}

	/**
	 * @param Collection $contentsCss
	 */
	public function setContentsCss($contentsCss) {
		$this->contentsCss = $contentsCss;
	}


	private $extraPluginsList = array(
		'pastefromword'  => 'CKEditorPHP\plugins\PastefromwordPlugin',
		'image2'         => 'CKEditorPHP\plugins\Image2Plugin',
		'find'           => 'CKEditorPHP\plugins\FindPlugin',
		'copyformatting' => 'CKEditorPHP\plugins\CopyformattingPlugin',
	);
}