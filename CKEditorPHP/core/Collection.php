<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 22.06.2017
 * Time: 2:35
 */

namespace CKEditorPHP\core;


use JsonSerializable;

class Collection implements JsonSerializable {
	protected $elements = array();
	/**
	 * @var bool
	 */
	private $serializeAsJson;

	/**
	 * Collection constructor.
	 *
	 * @param array $elements
	 * @param bool  $serializeAsJson
	 */
	public function __construct($elements = array(), $serializeAsJson = false) {
		if (!is_array($elements)) {
			$this->elements[] = $elements;
		} else {
			$this->elements = $elements;
		}
		$this->serializeAsJson = $serializeAsJson;
	}

	/**
	 * @param      $elem
	 *
	 * @param null $key
	 *
	 * @return $this
	 */
	public function add($elem, $key = null) {
		if ($key) {
			$this->elements[$key] = $elem;
		} else {
			$this->elements[] = $elem;
		}
		return $this;
	}

	public function del($key) {
		if(isset($this->elements[$key])){
			unset($this->elements[$key]);
			return true;
		}
		return false;
	}

	public function delByValue($value) {
		$key = array_search($value, $this->elements);
		if ($key !== null) {
			unset($this->elements[$key]);
		}
	}

	public function __toString() {
		return implode(',', $this->elements);
	}
	public function jsonSerialize() {
		if($this->serializeAsJson){
			return $this->elements;
		}

		return (string)$this;
	}

}