<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 23.06.2017
 * Time: 13:51
 */

namespace CKEditorPHP\core;


class AbstractView {
	protected $selector;
	protected $data;

	public function __construct() {

	}

	/**
	 * @param array $data
	 *
	 * @return AbstractView
	 */
	public function setData($data) {
		$this->data = $data;

		return $this;
	}

	/**
	 * @param string $selector
	 *
	 * @return AbstractView
	 */
	public function setSelector($selector) {
		$this->selector = $selector;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getSelector() {
		return $this->selector;
	}

	/**
	 * @return array
	 */
	public function getData() {
		return $this->data;
	}
}