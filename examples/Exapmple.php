<?php

use CKEditorPHP\CKEditorPHP;
use CKEditorPHP\view\JQueryView;

include '../__autoload.php';

$CKEditor = new CKEditorPHP('.textarea-ckeditor');

$CKEditor->addToConfig('removePlugins', 'font');

$CKEditor
	->addExtraPlugin(new \CKEditorPHP\plugins\Image2Plugin(true))
	->addExtraPlugin(new \CKEditorPHP\plugins\FindPlugin())
	->addExtraPlugin(new \CKEditorPHP\plugins\CopyformattingPlugin())
	->addExtraPlugin(new \CKEditorPHP\plugins\PastefromwordPlugin());
//	->addPlugin(\CKEditorPHP\core\PluginFactory::factory('codemirror'))
//	->addPlugin(\CKEditorPHP\core\PluginFactory::factory('autosave'))
//	->addPlugin(\CKEditorPHP\core\PluginFactory::factory('youtube'));

$CKEditor->getContentsCss()->add('/libraries/ckeditor/ckeditorfix.css');


//$CKEditor->getExtraPlugins()->add('showprotected');
//$CKEditor->addLine('CKEDITOR.config.protectedSource.push(/\{\{\s.+\s\}\}/g);');
//$CKEditor->addLine('CKEDITOR.config.protectedSource.push(/\{%\s.+\s%\}/g);');



$CKEditor->addToConfig('codemirror', array(
	// Set this to the theme you wish to use (codemirror themes)
	'theme'                  => 'default',
	// Whether or not you want to show line numbers
	'lineNumbers'            => true,
	// Whether or not you want to use line wrapping
	'lineWrapping'           => true,
	// Whether or not you want to highlight matching braces
	'matchBrackets'          => true,
	// Whether or not you want tags to automatically close themselves
	'autoCloseTags'          => true,
	// Whether or not you want Brackets to automatically close themselves
	'autoCloseBrackets'      => true,
	// Whether or not to enable search tools, CTRL+F (Find), CTRL+SHIFT+F (Replace), CTRL+SHIFT+R (Replace All), CTRL+G (Find Next), CTRL+SHIFT+G (Find Previous)
	' enableSearchTools'     => true,
	// Whether or not you wish to enable code folding (requires 'lineNumbers' to be set to 'true')
	'enableCodeFolding'      => true,
	// Whether or not to enable code formatting
	'enableCodeFormatting'   => true,
	// Whether or not to automatically format code should be done when the editor is loaded
	'autoFormatOnStart'      => true,
	// Whether or not to automatically format code should be done every time the source view is opened
	'autoFormatOnModeChange' => true,
	// Whether or not to automatically format code which has just been uncommented
	'autoFormatOnUncomment'  => true,
	// Define the language specific mode 'htmlmixed' for html including (css, xml, javascript), 'application / x - httpd - php' for php mode including html, or 'text / javascript' for using java script only
	'mode'                   => 'htmlmixed',
	// Whether or not to show the search Code button on the toolbar
	'showSearchButton'       => true,
	// Whether or not to show Trailing Spaces
	'showTrailingSpace'      => true,
	// Whether or not to highlight all matches of current word/selection
	'highlightMatches'       => true,
	// Whether or not to show the format button on the toolbar
	'showFormatButton'       => true,
	// Whether or not to show the comment button on the toolbar
	'showCommentButton'      => true,
	// Whether or not to show the uncomment button on the toolbar
	'showUncommentButton'    => true,
	// Whether or not to show the showAutoCompleteButton button on the toolbar
	'showAutoCompleteButton' => true,
	// Whether or not to highlight the currently active line
	'styleActiveLine'        => true
))->addToConfig('entities', false)
	->enableAllowedContent();

//PluginManager::I()->fireEvent('PageAdmin->createEditor()', array('CKEditor' => $CKEditor));
echo '<pre>';
//echo $CKEditor;
var_dump($CKEditor->getConfig());
echo '</pre>';
?>
<!DOCTYPE html>
<html>
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
