<?php
/**
 * Created by PhpStorm.
 * User: Mikhail
 * Date: 23.06.2017
 * Time: 13:47
 */

namespace CKEditorPHP\view;


use CKEditorPHP\core\AbstractView;

class JQueryView extends AbstractView {
	public function __toString() {
		$data = $this->getData();
		$s    = '';
		if (!empty($data['lines'])) {
			foreach ($data['lines'] as $line) {
				$s .= $line;
			}
		}
		unset($data['lines']);

		$s .= /** @lang JavaScript */
			'var d = ' . json_encode($data) . ';
		if (d.externals) {
		    $.each(d.externals, function (index, value) {
		        if (value.name && value.dir) {
		            CKEDITOR.plugins.addExternal(value.name, value.dir, value.filename);
		        }
		    });
		}
        d.externals=null;
        
        CKEDITOR.config.protectedSource.push(/<i[^>]*><\/i>/g);
        ';


		return $s . '$( "' . $this->getSelector() . '" ).ckeditor(d);';
	}
}