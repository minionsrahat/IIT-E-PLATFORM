# Wysiwyg-BBCODE-Editor
_**Warning!** I'm not a professional javascript developer so this project won't be so free of bugs but if you find any please report them and as soos as I can I will try to fix them. All help is appreciated!_

# Installation
1. Include the [jQuery](https://jquery.com) and [Bootstrap](http://getbootstrap.com) library in the `head` and ` body` tag! _(Links can only be included in the `head` tag)_
```html
<!-- This in the head tag! -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
<!-- This in the head tag! -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.js"></script>
```
2. Include the plugin's required libraries in the `body` tag! _(Links can only be included in the `head` tag)_
```html
<!-- This in the head tag! -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css">
<link rel="stylesheet" href="/path_to/editor.css">
<!-- This in the head tag! -->

<!-- Ace is required for the advanced code editor! -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.4/ace.js"></script>
<!-- Include the language file for the editor! (You may include multiple languages if you want) -->
<script src="/path_to/lang/en_EN.js"></script>
<!-- Include the icon set for the editor! (Default is Font Awesome 5) -->
<script src="/path_to/icons/font-awesome-5.js"></script>
<script src="/path_to/editor.js"></script>
```
# Usage
#### Example:
```html
<div id="editor"></div>

<script>
$(function() {
  $('#editor').wysiwyg_editor({
    selector: "message" // The selector must be always included and have a different name!
  });
});
</script>
```
### Example with options:
```html
<div id="editor"></div>

<script>
$(function() {
  $('#editor').wysiwyg_editor({
    selector: "message", // The selector must be always included and have a different name!
    defaultValue: '[b]Hello World![/b]', // This value will be outputed in the editor's textarea!
    advancedCodeEditorTheme: "GitHub" // This will be the theme for the advanced code editor textarea!
  });
});
</script>
```

# Options _(Default)_
_**Please do not edit this in the `editor.js` if you want to change some settings!**_
```javascript
var defaults = {
  selector: "",
  enableFooter: true,
  defaultValue: "",
  lang: "en-EN",
  icons: "font-awesome-5",
  includedButtons: [
    ['bold', 'italic', 'underline'], ['strikethrough', 'superscript', 'subscript'], ['font-name', 'font-size', 'color'], ['unordered-list', 'ordered-list', 'align'], ['link', 'image', 'media'], ['misc', 'advcode', 'table']
  ],
  height: "auto",
  width: "auto",
  enableWordCount: false,
  maxCharacters: 250,
  colorPresets: ['#1ABC9C', '#16A085', '#2ECC71', '#27AE60', '#3498DB', '#2980B9', '#34495E', '#2C3E50', '#EA4C88', '#CA2C68', '#9B59B6', '#8E44AD', '#F1C40F', '#F39C12', '#E74C3C', '#C0392B', '#ECF0F1', '#BDC3C7', '#95A5A6', '#7F8C8D'],
  enableLinkTarget: true,
  linkTargetTemplate: '<input type="checkbox" id="{id}" checked> {lang.target}',
  enableImageInsertAlert: true,
  enableImagePreview: true,
  enableMediaPreview: true,
  advancedCodeEnabledLanguages: ['General Code', 'HTML', 'CSS', 'Javascript', 'PHP', 'XML', 'JSON', 'SQL', 'Ruby', 'Python', 'Java', 'C', 'C#', 'C++', 'Lua', 'Markdown', 'Yaml'],
  advancedCodeEditorTheme: "chrome",
  miscItems: ['quote', 'code', 'spoiler', 'linebreak']
};
```
