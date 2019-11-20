<?php


namespace CKEditorPHP\core;


class ContentsCssCollection extends Collection {

	public function jsonSerialize() {

		return array_values($this->elements);
	}
}