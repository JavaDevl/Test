/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
config.scayt_autoStartup = true;
	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';
config.extraPlugins = 'doksoft_image,doksoft_preview,doksoft_resize,wordcount';
config.toolbar_name = [ [ 'doksoft_image', 'doksoft_preview', 'doksoft_resize']  ];
config.filebrowserImageUploadUrl = '../ckeditor/plugins/doksoft_uploader/uploader.php?type=Images';
config.filebrowserImageThumbsUploadUrl = '../ckeditor/plugins/doksoft_uploader/uploader.php?type=Images&makeThumb=true';
config.filebrowserImageResizeUploadUrl = '../ckeditor/plugins/doksoft_uploader/uploader.php?type=Images&resize=true';
	// Make dialogs simpler._image', 'doksoft_preview', 'doksoft_resize']  ];
config.filebrowserImageUploadUrl = '../ckeditor/plugins/doksoft_uploader/uploader.php?type=Images';

	config.removeDialogTabs = 'image:advanced;link:advanced';
        config.wordcount = {

    // Whether or not you want to show the Word Count
    showWordCount: true,

    // Whether or not you want to show the Char Count
    showCharCount: true,
    
    // Option to limit the characters in the Editor
    charLimit: 'unlimited',
  
    // Option to limit the words in the Editor
    wordLimit: 'unlimited'
};
};
