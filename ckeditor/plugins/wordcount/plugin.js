/**
 * @license Copyright (c) CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.plugins.add('wordcount', {
    lang: ['ca', 'de', 'en', 'es', 'fr', 'pl'],
    init: function (editor) {
        
        var defaultFormat = '<span class="cke_path_item">';
        
        var intervalId;
        var lastWordCount;
        var lastCharCount = 0;
        var limitReachedNotified = false;
        var limitRestoredNotified = false;
        
        // Default Config
        var defaultConfig = {
            showWordCount: true,
            showCharCount: false,
            charLimit: 'unlimited',
            wordLimit: 'unlimited'
        };
        
        // Get Config & Lang
        var config = CKEDITOR.tools.extend(defaultConfig, editor.config.wordcount || {}, true);
        
        if (config.showCharCount) {
            defaultFormat += editor.lang.wordcount.CharCount + '&nbsp;%charCount%';


            if (config.charLimit != 'unlimited') {
                defaultFormat += '&nbsp;(' + editor.lang.wordcount.limit + '&nbsp;' + config.charLimit + ')';
            }
        }

        if (config.showCharCount && config.showWordCount) {
            defaultFormat += ',&nbsp;';
        }

        if (config.showWordCount) {
            defaultFormat += editor.lang.wordcount.WordCount + ' %wordCount%';
            
            if (config.wordLimit != 'unlimited') {
                defaultFormat += '&nbsp;(' + editor.lang.wordcount.limit + '&nbsp;' + config.wordLimit + ')';
            }
        }
        
        defaultFormat += '</span>';
        
        var format = defaultFormat;

        CKEDITOR.document.appendStyleSheet(this.path + 'css/wordcount.css');

        function counterId(editorInstance) {
            return 'cke_wordcount_' + editorInstance.name;
        }

        function counterElement(editorInstance) {
            return document.getElementById(counterId(editorInstance));
        }

        function strip(html) {
            var tmp = document.createElement("div");
            tmp.innerHTML = html;

            if (tmp.textContent == '' && typeof tmp.innerText == 'undefined') {
               return '0';
            }
            return tmp.textContent || tmp.innerText;
        }
        
        function updateCounter(editorInstance) {
            var wordCount = 0;
            var charCount = 0;

            if (editorInstance.getData()) {
                var text = editorInstance.getData().replace(/(\r\n|\n|\r)/gm, " ").replace("&nbsp;", " ");
                
                if (config.showWordCount) {
					wordCount = strip(text).split(/\s+/).length-1;
                }
                
                charCount = strip(text).length-1;
                
            }
            document.getElementsByName('word')[0].value=wordCount;
            document.getElementsByName('char')[0].value=charCount;
            var html = format.replace('%wordCount%', wordCount).replace('%charCount%', charCount);
            
            counterElement(editorInstance).innerHTML = html;

            if (charCount == lastCharCount) {
                return true;
            } else {
                lastWordCount = wordCount;
                lastCharCount = charCount;
            }
            
            // Check for word limit
            if (config.showWordCount && wordCount > config.wordLimit) {
                limitReached(editor, limitReachedNotified);
            } else if (!limitRestoredNotified && wordCount < config.wordLimit) {
                limitRestored(editor);
            }
            
            // Check for char limit
            if (config.showCharCount && charCount > config.charLimit) {
                limitReached(editor, limitReachedNotified);
            } else if (!limitRestoredNotified && charCount < config.charLimit) {
                limitRestored(editor);
               
            }
            
            return true;
        }

        function limitReached(editorInstance, notify) {
            limitReachedNotified = true;
            limitRestoredNotified = false;
            
            editorInstance.execCommand('undo');
            if (!notify) {
                counterElement(editorInstance).className += " cke_wordcountLimitReached";

                editorInstance.fire('limitReached', {}, editor);
            }
            // lock editor
            editorInstance.config.Locked = 1;
            editorInstance.fire("change");
        }

        function limitRestored(editorInstance) {
            limitRestoredNotified = true;
            limitReachedNotified = false;
            editorInstance.config.Locked = 0;
            
            counterElement(editorInstance).className = "cke_wordcount";
        }

        editor.on('uiSpace', function(event) {
            if (event.data.space == 'bottom') {
                event.data.html += '<div id="' + counterId(event.editor) + '" class="cke_wordcount" style=""' + ' title="' + editor.lang.wordcount.title + '"' + '>&nbsp;</div>';
            }
        }, editor, null, 100);
       editor.on('dataReady', function(event) {
            var count = event.editor.getData().length;
            if (count > config.wordLimit) {
                limitReached(editor);
            }
            updateCounter(event.editor);
        }, editor, null, 100);
		editor.on('key', function (event) {
		    updateCounter(event.editor);
		}, editor, null, 100);
		editor.on('afterPaste', function (event) {
		    updateCounter(event.editor);
		}, editor, null, 100);
       /* editor.on('change', function (event) {
            updateCounter(event.editor);
        }, editor, null, 100);*/
        editor.on('focus', function(event) {
            //editorHasFocus = true;
            intervalId = window.setInterval(function() {
                updateCounter(editor);
            }, 300, event.editor);
        }, editor, null, 300);
        editor.on('blur', function() {
            //editorHasFocus = false;
            if (intervalId) {
                window.clearInterval(intervalId);
            }
        }, editor, null, 300);
    }
});
