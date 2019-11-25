<?php

use CKEditorPHP\CKEditorPHP;

include '../__autoload.php';

$CKEditor = new CKEditorPHP('.textarea-ckeditor');

$CKEditor->addToConfig('removePlugins', 'font');
$CKEditor
	->addExtraPlugin(new \CKEditorPHP\plugins\Image2Plugin(true))
	->addExtraPlugin(new \CKEditorPHP\plugins\FindPlugin())
	->addExtraPlugin(new \CKEditorPHP\plugins\CopyformattingPlugin())
	->addExtraPlugin('pastefromword');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CKEditor</title>


	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<script src="https://cdn.ckeditor.com/4.13.0/full-all/ckeditor.js"></script>
	<script src="https://cdn.ckeditor.com/4.13.0/full-all/adapters/jquery.js"></script>
</head>
<body>
<textarea class="textarea-ckeditor"></textarea>
<script>
    <?php echo $CKEditor ?>
</script>



</body>
</html>
