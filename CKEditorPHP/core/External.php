<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 22.06.2017
 * Time: 14:31
 */

namespace CKEditorPHP\core;


class External extends Collection {
	public function getData() {
		return $this->elements;
	}

	/**
	 * @param  string| array $name
	 * @param                $path
	 * @param string         $filename
	 *
	 * @return $this
	 * @internal param $elem
	 *
	 */
	public function addResource($name, $path, $filename = '') {
		$this->elements[] = array('name' => $name, 'dir' => $path, 'file' => $filename);

		return $this;
	}

	public function jsonSerialize() {
		return $this->elements;
	}
}