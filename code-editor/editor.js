/*
  >> Credits
    >> Author: MrAnonymusz
    >> Contact Link: https://github.com/MrAnonymusz
    >> Licence: MIT License
*/

(function($) {
  // Editor Selector
  var selector;

  // Remove BBCode
  function removeBBCode(value)
  {
    var output = value.replace(/\[(\w+)[^w]*?](.*?)\[\/\1]/g, '$2');

    return output;
  }

  // Buttons
  function displayButton(value, defaults, options, lang, icon)
  {
    var output;

    var advcode_theme;

    selector = options.selector;

    switch(value)
    {
      case 'bold':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_bold">' + icon['bold'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_bold").tooltip({ html: true, placement: "bottom", title: "<b>' + lang['font']['bold'] + '</b>" }); });</script>';

        return output;
        break;
      case 'italic':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_italic"">' + icon['italic'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_italic").tooltip({ html: true, placement: "bottom", title: "<i>' + lang['font']['italic'] + '</i>" }); });</script>';

        return output;
        break;
      case 'underline':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_underline"">' + icon['underline'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_underline").tooltip({ html: true, placement: "bottom", title: "<u>' + lang['font']['underline'] + '</u>" }); });</script>';

        return output;
        break;
      case 'strikethrough':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_strikethrough">' + icon['strikethrough'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_strikethrough").tooltip({ html: true, placement: "bottom", title: "<strike>' + lang['font']['strikethrough'] + '</strike>" }); });</script>';

        return output;
        break;
      case 'superscript':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_superscipt">' + icon['superscript'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_superscipt").tooltip({ html: true, placement: "bottom", title: "x<sup>' + lang['font']['supperscript'] + '</sup>" }); });</script>';

        return output;
        break;
      case 'subscript':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_subscript">' + icon['subscript'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_subscript").tooltip({ html: true, placement: "bottom", title: "x<sub>' + lang['font']['subscript'] + '</sub>" }); });</script>';

        return output;
        break;
      case 'font-name':
        output = '<div class="btn-group"><button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="' + selector + '_editor_button_font_name">' + icon['font_name'] + '</button><ul class="dropdown-menu" aria-labelledby="' + selector + '_editor_button_font_name"><li><a href="javascript:;" id="font_arial">Arial</a></li><li><a href="javascript:;" id="font_times_new_roman">Times New Roman</a></li><li><a href="javascript:;" id="font_impact">Impact</a></li><li><a href="javascript:;" id="font_courier_new">Courier New</a></li><li><a href="javascript:;" id="font_open_sans">Open Sans</a></li></ul></div>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_font_name").tooltip({ html: true, placement: "bottom", title: "<span class=' + "'" +'editor_button_font_family' + "'" + '>' + lang['font']['font_name'] + '</span>" }); });</script>';

        return output;
        break;
      case 'font-size':
        output = '<div class="btn-group"><button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="' + selector + '_editor_button_font_size">' + icon['font_size'] + '</button><ul class="dropdown-menu" aria-labelledby="' + selector + '_editor_button_font_size"><li><a href="javascript:;" id="font_size_12">12</a></li><li><a href="javascript:;" id="font_size_14">14</a></li><li><a href="javascript:;" id="font_size_16">16</a></li><li><a href="javascript:;" id="font_size_18">18</a></li><li><a href="javascript:;" id="font_size_20">20</a></li><li><a href="javascript:;" id="font_size_22">22</a></li><li><a href="javascript:;" id="font_size_24">24</a></li></ul></div>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_font_size").tooltip({ html: true, placement: "bottom", title: "<span class=' + "'" +'editor_button_font_size' + "'" +'>' + lang['font']['font_size'] + '</span>" }); });</script>';

        return output;
        break;
      case 'color':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_color">' + icon['color'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_color").tooltip({ html: true, placement: "bottom", title: "<span class=' + "'" +'editor_button_color' + "'" +'>' + lang['font']['color']['button'] + '</span>" }); });</script>';

        modal_body = '<div class="container-fluid editor_color_picker_body">';
        modal_body += '<div class="row">';
        modal_body += '<div class="col-md-6">';
        modal_body += '<div class="editor_color_picker_background" id="' + selector + '_editor_color_picker_background"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p></div>';
        modal_body += '</div>';
        modal_body += '<div class="col-md-6">';
        modal_body += '<div class="editor_color_picker_presets">';
        modal_body += '<ul class="editor_preset_colors">';

        if(typeof options.colorPresets == "undefined" || options.colorPresets == "")
        {
          for(var i = 0; i < defaults.colorPresets.length; i++)
          {
            modal_body += '<li class="editor_preseted_color" id="' + selector + '_editor_preseted_color_' + i + '" data_color="' + defaults.colorPresets[i] + '"><div style="background-color: ' + defaults.colorPresets[i] + '"></div></li>';

            modal_body += '<script>$(function() { $("#' + selector + '_editor_preseted_color_' + i + '").click(function() { $("#' + selector + '_edit_color_picker_input").val($("#' + selector + '_editor_preseted_color_' + i + '").attr("data_color")); $("#' + selector + 'editor_color_picker_background").css("background-color", $("#' + selector +'_editor_preseted_color_' + i + '").attr("data_color")); }); });</script>';
          }
        }
        else
        {
          for(var i = 0; i < options.colorPresets.length; i++)
          {
            modal_body += '<li class="editor_preseted_color" id="' + selector + '_editor_preseted_color_' + options.colorPresets[i] + '"><div style="background-color: ' + options.colorPresets[i] + '"></div></li>';
          }
        }

        modal_body += '</ul>';
        modal_body += '</div><hr>';
        modal_body += '<div class="edit_color_picker_input"><div class="form-group"><input type="text" class="form-control" id="' + selector + '_edit_color_picker_input" placeholder="' + lang['font']['color']['input'] + '" autocomplete="off" value="#000000"></div></div>';
        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';

        modal_footer = '<button type="button" class="btn btn-primary" id="' + selector + '_editor_modal_insert_color">' + lang['insert'] + '</button>';

        if(!$('div#' + selector + '_wysiwyg_editor_modals').has('div#' + selector + '_editor_modal_color'))
        {
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_color', lang['font']['color']['modal'], modal_body, icon, options, modal_footer));
        }
        else
        {
          $('#' + selector + '_editor_modal_color').remove();
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_color', lang['font']['color']['modal'], modal_body, icon, options, modal_footer));
        }

        $('#' + selector + '_editor_color_picker_background').css('background-color', $('#' + selector + '_edit_color_picker_input').val());

        return output;
        break;
      case 'unordered-list':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_unordered_list">' + icon['unordered_list'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_unordered_list").tooltip({ html: false, placement: "bottom", title: "' + lang['text']['unordered_list'] + '" }); });</script>';

        return output;
        break;
      case 'ordered-list':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_ordered_list">' + icon['ordered_list'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_ordered_list").tooltip({ html: false, placement: "bottom", title: "' + lang['text']['ordered_list'] + '" }); });</script>';

        return output;
        break;
      case 'align':
        output = '<div class="btn-group"><button class="btn btn-default" id="' + selector + '_editor_button_align" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' + icon['align'] + '</button><ul class="dropdown-menu" aria-labelledby="' + selector + '_editor_button_align"><li><a href="javascript:;" id="' + selector + '_align_left">' + lang['text']['align']['left'] + '</a></li><li><a href="javascript:;" id="align_center">' + lang['text']['align']['center'] + '</a></li><li><a href="javascript:;" id="align_right">' + lang['text']['align']['right'] + '</a></li></ul></div>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_align").tooltip({ html: false, placement: "bottom", title: "' + lang['text']['align']['button'] + '" }); });</script>';

        return output;
        break;
      case 'link':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_link">' + icon['link'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_link").tooltip({ html: false, placement: "bottom", title: "' + lang['inserts']['link']['button'] + '" }); });</script>';

        modal_body = '<div class="container-fluid editor_link_insert_body">';
        modal_body += '<div class="row">';
        modal_body += '<div class="col-md-12">';
        modal_body += '<div class="editor_link_text"><div class="form-group"><input type="text" class="form-control" id="' + selector + '_editor_link_text" placeholder="Lorem ipsum dolor sit amet..." autocomplete="off"></div></div>';
        modal_body += '<div class="editor_link_input"><div class="form-group"><input type="text" class="form-control" id="' + selector + '_editor_link_input" placeholder="https://example.com" autocomplete="off"></div></div>';

        if(typeof options.enableLinkTarget == "undefined")
        {
          if(defaults.enableLinkTarget === true)
          {
            modal_body += '<div class="editor_link_target">';

            if(typeof options.linkTargetTemplate == "undefined" || options.linkTargetTemplate == "")
            {
              modal_body += defaults.linkTargetTemplate.replace(['{id}', '{lang.target}'], ['editor_link_target ' + selector + '_editor_link_target', lang['inserts']['link']['target']]);
            }
            else
            {
              modal_body += options.linkTargetTemplate.replace(['{id}', '{lang.target}'], ['editor_link_target ' + selector + '_editor_link_target', lang['inserts']['link']['target']]);
            }

            modal_body += '</div>';
          }
        }
        else
        {
          if(options.enableLinkTarget === true)
          {
            modal_body += '<div class="editor_link_target">';

            if(typeof options.linkTargetTemplate == "undefined" || options.linkTargetTemplate == "")
            {
              modal_body += defaults.linkTargetTemplate.replace(['{id}', '{lang.target}'], ['editor_link_target ' + selector + '_editor_link_target', lang['inserts']['link']['target']]);
            }
            else
            {
              modal_body += options.linkTargetTemplate.replace(['{id}', '{lang.target}'], ['editor_link_target ' + selector + '_editor_link_target', lang['inserts']['link']['target']]);
            }

            modal_body += '</div>';
          }
        }

        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';

        modal_footer = '<button type="button" class="btn btn-primary" id="' + selector + '_editor_modal_insert_link">' + lang['insert'] + '</button>';

        if(!$('div#' + selector + '_wysiwyg_editor_modals').has('div#' + selector + '_editor_modal_link'))
        {
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_link', lang['inserts']['link']['modal'], modal_body, icon, options, modal_footer));
        }
        else
        {
          $('#' + selector + '_editor_modal_link').remove();
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_link', lang['inserts']['link']['modal'], modal_body, icon, options, modal_footer));
        }

        return output;
        break;
      case 'image':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_image">' + icon['image'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_image").tooltip({ html: false, placement: "bottom", title: "' + lang['inserts']['image']['button'] + '" }); });</script>';

        modal_body = '<div class="container-fluid editor_image_insert_body">';
        modal_body += '<div class="row">';
        modal_body += '<div class="col-md-12">';

        if(typeof options.enableImageInsertAlert == "undefined")
        {
          if(defaults.enableImageInsertAlert === true)
          {
            modal_body += '<div class="alert alert-info editor_image_insert_alert" role="alert">' + lang['inserts']['image']['site'] + '</div>';
          }
        }
        else
        {
          if(options.enableImageInsertAlert === true)
          {
            modal_body += '<div class="alert alert-info editor_image_insert_alert" role="alert">' + lang['inserts']['image']['site'] + '</div>';
          }
        }

        if(typeof options.enableImagePreview == "undefined")
        {
          if(defaults.enableImagePreview === true)
          {
            modal_body += '<img src="https://i.ibb.co/QKHTRwr/default-image-insert.jpg" class="editor_image_insert_preview" id="' + selector + '_editor_image_insert_preview" draggable="false" /><hr>';
            modal_body += '<div class="editor_image_input"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="' + selector + '_editor_image_input" placeholder="https://example.com/image.jpg"><span class="input-group-btn"><button class="btn btn-info" id="' + selector + '_editor_button_image_insert_preview" type="button">' + lang['preview']['button'] + '</button></span></div></div></div>';
          }
          else
          {
            modal_body += '<div class="editor_image_input"><div class="form-group"><input type="text" class="form-control" id="' + selector + '_editor_image_input" placeholder="https://example.com/image.jpg"></div></div>';
          }
        }
        else
        {
          if(options.enableImagePreview === true)
          {
            modal_body += '<img src="https://i.ibb.co/QKHTRwr/default-image-insert.jpg" class="editor_image_insert_preview" id="' + selector + '_editor_image_insert_preview" draggable="false" /><hr>';
            modal_body += '<div class="editor_image_input"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="' + selector + '_editor_image_input" placeholder="https://example.com/image.jpg"><span class="input-group-btn"><button class="btn btn-info" id="' + selector + '_editor_button_image_insert_preview" type="button">' + lang['preview']['button'] + '</button></span></div></div></div>';
          }
          else
          {
            modal_body += '<div class="' + selector + '_editor_image_input"><div class="form-group"><input type="text" class="form-control" id="' + selector + '_editor_image_input" placeholder="https://example.com/image.jpg"></div></div>';
          }
        }

        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';

        modal_footer = '<button type="button" class="btn btn-primary" id="' + selector + '_editor_modal_insert_image">' + lang['insert'] + '</button>';

        if(!$('div#' + selector + '_wysiwyg_editor_modals').has('div#' + selector + '_editor_modal_image'))
        {
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_image', lang['inserts']['image']['modal'], modal_body, icon, options, modal_footer));
        }
        else
        {
          $('#' + selector + '_editor_modal_image').remove();
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_image', lang['inserts']['image']['modal'], modal_body, icon, options, modal_footer));
        }

        return output;
        break;
      case 'media':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_media">' + icon['media'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_media").tooltip({ html: false, placement: "bottom", title: "' + lang['inserts']['media']['button'] + '" }); });</script>';

        modal_body = '<div class="container-fluid editor_media_insert_body">';
        modal_body += '<div class="row">';
        modal_body += '<div class="col-md-12">';

        if(typeof options.enableMediaPreview == "undefined")
        {
          if(defaults.enableMediaPreview === true)
          {
            modal_body += '<iframe width="540" height="315" id="' + selector + '_editor_media_insert_preview" src="https://www.youtube.com/embed/-tJYN-eG1zk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><hr id="editor_media_insert_divider">';
          }
        }
        else
        {
          if(options.enableMediaPreview === true)
          {
            modal_body += '<iframe width="540" height="315" id="' + selector + '_editor_media_insert_preview" src="https://www.youtube.com/embed/-tJYN-eG1zk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><hr id="editor_media_insert_divider">';
          }
        }

        if(typeof options.enableMediaPreview == "undefined")
        {
          if(defaults.enableMediaPreview === true)
          {
            modal_body += '<div class="container-fluid editor_media_insert_input"><div class="row"><div class="col-md-3 editor_media_insert_type"></div><div class="col-md-9"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="' + selector + '_editor_media_insert_input" placeholder="https://www.youtube.com/embed/-tJYN-eG1zk"><span class="input-group-btn"><button class="btn btn-info" id="' + selector + '_editor_button_media_insert_preview" type="button">' + lang['preview']['button'] + '</button></span></div></div></div></div></div>';
          }
          else
          {
            modal_body += '<div class="container-fluid editor_media_insert_input"><div class="row"><div class="col-md-3 editor_media_insert_type"></div><div class="col-md-9"><div class="form-group"><input type="text" class="form-control" id="' + selector + '_editor_media_insert_input" placeholder="https://www.youtube.com/embed/-tJYN-eG1zk"></div></div></div></div>';
          }
        }
        else
        {
          if(options.enableMediaPreview === true)
          {
            modal_body += '<div class="editor_media_insert_input"><div class="form-group"><div class="input-group"><input type="text" class="form-control" id="' + selector + '_editor_media_insert_input" placeholder="https://www.youtube.com/embed/-tJYN-eG1zk"><span class="input-group-btn"><button class="btn btn-info" id="' + selector + '_editor_button_media_insert_preview" type="button">' + lang['preview']['button'] + '</button></span></div></div></div>';
          }
          else
          {
            modal_body += '<div class="editor_media_insert_input"><div class="form-group"><input type="text" class="form-control" id="' + selector + '_editor_media_insert_input" placeholder="https://www.youtube.com/embed/-tJYN-eG1zk"></div></div>';
          }
        }

        modal_body += '<input type="hidden" id="' + selector + '_editor_media_insert_embed">';

        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';

        modal_footer = '<button type="button" class="btn btn-primary" id="' + selector + '_editor_modal_insert_media">' + lang['insert'] + '</button>';

        if(!$('div#' + selector + '_wysiwyg_editor_modals').has('div#' + selector + '_editor_modal_media'))
        {
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_media', lang['inserts']['media']['modal'], modal_body, icon, options, modal_footer));
        }
        else
        {
          $('#' + selector + '_editor_modal_media').remove();
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_media', lang['inserts']['media']['modal'], modal_body, icon, options, modal_footer));
        }

        media_type_template = '<div class="form-group"><select class="form-control" id="' + selector + '_editor_media_insert_type"><option value="youtube" selected>YouTube</option><option value="vimeo">Vimeo</option><option value="other">' + lang['other'] + '</option></select></div>';

        $('.editor_media_insert_type').append(media_type_template);

        return output;
        break;
      case 'misc':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_misc">' + icon['misc'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_misc").tooltip({ html: false, placement: "bottom", title: "' + lang['inserts']['misc']['button'] + '" }); });</script>';

        modal_body = '<div class="container-fluid editor_misc_insert_body">';
        modal_body += '<div class="row">';
        modal_body += '<div class="col-md-12">';
        modal_body += '<div class="editor_misc_items">';

        if(typeof options.miscItems == "undefined" || options.miscItems == "")
        {
          for(var i = 0; i < defaults.miscItems.length; i++)
          {
            modal_body += displayMiscItem(defaults.miscItems[i].toLowerCase(), defaults, options, lang, icon);
          }
        }
        else
        {
          for(var i = 0; i < options.miscItems.length; i++)
          {
            modal_body += displayMiscItem(options.miscItems[i].toLowerCase(), defaults, options, lang, icon);
          }
        }

        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';

        if(!$('div#' + selector + '_wysiwyg_editor_modals').has('div#' + selector + '_editor_modal_misc'))
        {
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_misc', lang['inserts']['misc']['modal'], modal_body, icon, options));
        }
        else
        {
          $('#' + selector + '_editor_modal_misc').remove();
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_misc', lang['inserts']['misc']['modal'], modal_body, icon, options));
        }

        return output;
        break;
      case 'advcode':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_advcode">' + icon['advcode'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_advcode").tooltip({ html: false, placement: "bottom", title: "' + lang['inserts']['advcode']['button'] + '" }); });</script>';

        modal_body = '<div class="container-fluid editor_advcode_insert_body">';
        modal_body += '<div class="row">';
        modal_body += '<div class="col-md-12">';
        modal_body += '<div class="editor_advcode_insert_type">';

        modal_body += '<div class="form-group"><select class="form-control" id="' + selector + '_editor_advcode_insert_type">';

        if(typeof options.advancedCodeEnabledLanguages == "undefined" || options.advancedCodeEnabledLanguages == "")
        {
          for(var i = 0; i < defaults.advancedCodeEnabledLanguages.length; i++)
          {
            modal_body += '<option value="' + defaults.advancedCodeEnabledLanguages[i].toLowerCase().replace(' ', '_') + '">' + defaults.advancedCodeEnabledLanguages[i] + '</option>';
          }
        }
        else
        {
          for(var i = 0; i < options.advancedCodeEnabledLanguages.length; i++)
          {
            modal_body += '<option value="' + options.advancedCodeEnabledLanguages[i].toLowerCase().replace(' ', '_') + '">' + options.advancedCodeEnabledLanguages[i] + '</option>';
          }
        }

        modal_body += '</select></div>';

        modal_body += '<div class="editor_advcode_insert_input"><div class="form-group"><div class="form-control" id="' + selector + '_editor_advcode_insert_input"></div></div></div>';

        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';

        modal_footer = '<button type="button" class="btn btn-primary" id="' + selector + '_editor_modal_insert_advcode">' + lang['insert'] + '</button>';

        if(!$('div#' + selector + '_wysiwyg_editor_modals').has('div#' + selector + '_editor_modal_advcode'))
        {
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_advcode', lang['inserts']['advcode']['modal'], modal_body, icon, options, modal_footer));
        }
        else
        {
          $('#' + selector + '_editor_modal_advcode').remove();
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_advcode', lang['inserts']['advcode']['modal'], modal_body, icon, options, modal_footer));
        }

        var advcode_editor = ace.edit(selector + "_editor_advcode_insert_input");
        advcode_editor.session.setOptions({
          tabSize: 2,
          wrap: true
        });

        if(typeof options.advancedCodeEditorTheme == "undefined" || options.advancedCodeEditorTheme == "")
        {
          advcode_editor.setTheme('ace/theme/' + defaults.advancedCodeEditorTheme.toLowerCase());
        }
        else
        {
          advcode_editor.setTheme('ace/theme/' + options.advancedCodeEditorTheme.toLowerCase());
        }
        
        return output;
        break;
      case 'table':
        output = '<button class="btn btn-default" id="' + selector + '_editor_button_table">' + icon['table'] + '</button>';

        output += '<script>$(function() { $("#' + selector + '_editor_button_table").tooltip({ html: false, placement: "bottom", title: "' + lang['inserts']['table']['button'] + '" }); });</script>';

        modal_body = '<div class="container-fluid editor_table_insert_body">';
        modal_body += '<div class="row">';
        modal_body += '<div class="col-md-12">';

        modal_body += '<div class="form-group editor_table_insert_rows"><input type="text" class="form-control" id="' + selector + '_editor_table_insert_rows" placeholder="' + lang['inserts']['table']['rows'] + '"></div>';
        modal_body += '<div class="form-group editor_table_insert_cols"><input type="text" class="form-control" id="' + selector + '_editor_table_insert_cols" placeholder="' + lang['inserts']['table']['cols'] + '"></div>';

        modal_body += '</div>';
        modal_body += '</div>';
        modal_body += '</div>';

        modal_footer = '<button type="button" class="btn btn-primary" id="' + selector + '_editor_modal_insert_table">' + lang['insert'] + '</button>';

        if(!$('div#' + selector + '_wysiwyg_editor_modals').has('div#' + selector + '_editor_modal_table'))
        {
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_table', lang['inserts']['table']['modal'], modal_body, icon, options, modal_footer));
        }
        else
        {
          $('#' + selector + '_editor_modal_table').remove();
          $('#' + selector + '_wysiwyg_editor_modals').append(buildModal('editor_modal_table', lang['inserts']['table']['modal'], modal_body, icon, options, modal_footer));
        }

        return output;
        break;
    }
  }

  function buttonAction(value, defaults, options)
  {
    selector = options.selector;

    var textarea = $('#' + selector);
    var selection = window.getSelection().toString();
    var old_value;
    var replaced_values;
    var option_value;
    var link_value;

    switch(value)
    {
      case 'bold':
        if(typeof selection != "undefined" && selection != "")
        {
          old_value = textarea.val();

          replaced_values = old_value.replace(selection, '[b]' + selection + '[/b]');

          textarea.val(replaced_values);
        }
        else
        {
          old_value = textarea.val();

          textarea.val(old_value + '[b][/b]');
        }
        break;
      case 'italic':
        if(typeof selection != "undefined" && selection != "")
        {
          old_value = textarea.val();

          replaced_values = old_value.replace(selection, '[i]' + selection + '[/i]');

          textarea.val(replaced_values);
        }
        else
        {
          old_value = textarea.val();

          textarea.val(old_value + '[i][/i]');
        }
        break;
      case 'underline':
        if(typeof selection != "undefined" && selection != "")
        {
          old_value = textarea.val();

          replaced_values = old_value.replace(selection, '[u]' + selection + '[/u]');

          textarea.val(replaced_values);
        }
        else
        {
          old_value = textarea.val();

          textarea.val(old_value + '[u][/u]');
        }
        break;
      case 'strikethrough':
        if(typeof selection != "undefined" && selection != "")
        {
          old_value = textarea.val();

          replaced_values = old_value.replace(selection, '[strike]' + selection + '[/strike]');

          textarea.val(replaced_values);
        }
        else
        {
          old_value = textarea.val();

          textarea.val(old_value + '[strike][/strike]');
        }
        break;
      case 'superscript':
        if(typeof selection != "undefined" && selection != "")
        {
          old_value = textarea.val();

          replaced_values = old_value.replace(selection, '[sup]' + selection + '[/sup]');

          textarea.val(replaced_values);
        }
        else
        {
          old_value = textarea.val();

          textarea.val(old_value + '[sup][/sup]');
        }
        break;
      case 'subscript':
        if(typeof selection != "undefined" && selection != "")
        {
          old_value = textarea.val();

          replaced_values = old_value.replace(selection, '[sub]' + selection + '[/sub]');

          textarea.val(replaced_values);
        }
        else
        {
          old_value = textarea.val();

          textarea.val(old_value + '[sub][/sub]');
        }
        break;
      case 'font-name':
        $('#font_arial').click(function() {
          option_value = "arial";
        });
        $('#font_times_new_roman').click(function() {
          option_value = "times_new_roman";
        });
        $('#font_impact').click(function() {
          option_value = "impact";
        });
        $('#font_courier_new').click(function() {
          option_value = "courier_new";
        });
        $('#font_open_sans').click(function() {
          option_value = "open_sans";
        });

        $('[aria-labelledby="' + selector + '_editor_button_font_name"]').one('click', function() {
          if(typeof selection != "undefined" && selection != "")
          {
            old_value = textarea.val();

            replaced_values = old_value.replace(selection, '[font=' + option_value +']' + selection + '[/font]');

            textarea.val(replaced_values);
          }
          else
          {
            old_value = textarea.val();

            textarea.val(old_value + '[font=' + option_value +'][/font]');
          }
        });
        break;
      case 'font-size':
        $('#font_size_12').click(function() {
          option_value = 12;
        });
        $('#font_size_14').click(function() {
          option_value = 14;
        });
        $('#font_size_16').click(function() {
          option_value = 16;
        });
        $('#font_size_18').click(function() {
          option_value = 18;
        });
        $('#font_size_20').click(function() {
          option_value = 20;
        });
        $('#font_size_22').click(function() {
          option_value = 22;
        });
        $('#font_size_24').click(function() {
          option_value = 24;
        });

        $('[aria-labelledby="' + selector + '_editor_button_font_size"]').one('click', function() {
          if(typeof selection != "undefined" && selection != "")
          {
            old_value = textarea.val();

            replaced_values = old_value.replace(selection, '[size=' + option_value +']' + selection + '[/size]');

            textarea.val(replaced_values);
          }
          else
          {
            old_value = textarea.val();

            textarea.val(old_value + '[size=' + option_value +'][/size]');
          }
        });
        break;
      case 'color':
        $('#' + selector + '_editor_modal_color').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
        });

        $('#' + selector + '_edit_color_picker_input').keyup(function() {
          $('#' + selector + '_editor_color_picker_background').css('background-color', $('#' + selector + '_edit_color_picker_input').val());
        });

        $('#' + selector + '_editor_modal_insert_color').click(function() {
          option_value = $('#' + selector + '_edit_color_picker_input').val();

          if(typeof selection != "undefined" && selection != "")
          {
            old_value = textarea.val();

            replaced_values = old_value.replace(selection, '[color=' + option_value + ']' + selection + '[/color]');

            textarea.val(replaced_values);
          }
          else
          {
            old_value = textarea.val();

            textarea.val(old_value + '[color=' + option_value + '][/color]');
          }

          $('#' + selector + '_editor_modal_color').modal('hide');
        });
        break;
      case 'unordered-list':
        if(typeof selection != "undefined" && selection != "")
        {
          old_value = textarea.val();

          replaced_values = old_value.replace(selection, '\n[ul]\n  [li]' + selection + '[/li]\n[/ul]\n');

          textarea.val(replaced_values);
        }
        else
        {
          old_value = textarea.val();

          textarea.val(old_value + '[ul]\n  [li][/li]\n[/ul]\n');
        }
        break;
      case 'ordered-list':
        if(typeof selection != "undefined" && selection != "")
        {
          old_value = textarea.val();

          replaced_values = old_value.replace(selection, '\n[ol]\n  [li]' + selection + '[/li]\n[/ol]\n');

          textarea.val(replaced_values);
        }
        else
        {
          old_value = textarea.val();

          textarea.val(old_value + '[ol]\n  [li][/li]\n[/ol]\n');
        }
        break;
      case 'align':
        $('#' + selector + '_align_left').click(function() {
          option_value = "left";
        });
        $('#' + selector + '_align_center').click(function() {
          option_value = "center";
        });
        $('#' + selector + '_align_right').click(function() {
          option_value = "right";
        });

        $('[aria-labelledby="' + selector + '_editor_button_align"]').one('click', function() {
          if(typeof selection != "undefined" && selection != "")
          {
            old_value = textarea.val();

            replaced_values = old_value.replace(selection, '[align=' + option_value +']' + selection + '[/align]');

            textarea.val(replaced_values);
          }
          else
          {
            old_value = textarea.val();

            textarea.val(old_value + '[align=' + option_value +'][/align]');
          }
        });
        break;

      case 'link':
        if(typeof selection != "undefined" && selection != "")
        {
          $('#' + selector + '_editor_link_text').val(selection);
        }

        $('#' + selector + '_editor_modal_link').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
        });

        $('#' + selector + '_editor_modal_insert_link').one('click', function() {
          if(typeof options.enableLinkTarget != "undefined")
          {
            option_value = [$('#' + selector + '_editor_link_text').val(), $('#' + selector + '_editor_link_input').val(), $('#editor_link_target').is(':checked')];
          }
          else
          {
            if(defaults.enableLinkTarget === true)
            {
              option_value = [$('#' + selector + '_editor_link_text').val(), $('#' + selector + '_editor_link_input').val(), $('#editor_link_target').is(':checked')];
            }
            else
            {
              option_value = [$('#' + selector + '_editor_link_text').val(), $('#' + selector + '_editor_link_input').val(), false];
            }
          }

          if(typeof selection != "undefined" && selection != "")
          {
            old_value = textarea.val();

            if(option_value[0] != "")
            {
              if(option_value[1] != "")
              {
                if(option_value[2] === false)
                {
                  replaced_values = old_value.replace(selection, '[url=' + option_value[1] +']' + option_value[0] + '[/url]');
                }
                else
                {
                  replaced_values = old_value.replace(selection, '[url href=' + option_value[1] +' blank=' + option_value[2] +']' + option_value[0] + '[/url]');
                }
              }
              else
              {
                if(option_value[2] === false)
                {
                  replaced_values = old_value.replace(selection, '[url][/url]');
                }
                else
                {
                  replaced_values = old_value.replace(selection, '[url blank=' + option_value[2] +'][/url]');
                }
              }
            }
            else
            {
              if(option_value[2] === false)
              {
                replaced_values = old_value.replace(selection, '[url]' + option_value[1] + '[/url]');
              }
              else
              {
                replaced_values = old_value.replace(selection, '[url blank=' + option_value[2] +']' + option_value[1] + '[/url]');
              }
            }

            textarea.val(replaced_values);
          }
          else
          {
            old_value = textarea.val();

            if(option_value[0] != "")
            {
              if(option_value[1] != "")
              {
                if(option_value[2] === false)
                {
                  replaced_values = '[url=' + option_value[1] +']' + option_value[0] + '[/url]';
                }
                else
                {
                  replaced_values = '[url href=' + option_value[1] +' blank=' + option_value[2] +']' + option_value[0] + '[/url]';
                }
              }
              else
              {
                if(option_value[2] === false)
                {
                  replaced_values = '[url][/url]';
                }
                else
                {
                  replaced_values = '[url blank=' + option_value[2] +'][/url]';
                }
              }
            }
            else
            {
              if(option_value[2] === false)
              {
                replaced_values = '[url]' + option_value[1] + '[/url]';
              }
              else
              {
                replaced_values = '[url blank=' + option_value[2] +']' + option_value[1] + '[/url]';
              }
            }

            textarea.val(old_value + replaced_values);
          }

          $('#' + selector + '_editor_link_text').val('');
          $('#' + selector + '_editor_link_input').val('');
          $('#' + selector + '_editor_modal_link').modal('hide');
        });
        break;

      case 'image':
        if(typeof selection != "undefined" && selection != "")
        {
          $('#' + selector + '_editor_image_input').val(selection);
        }

        $('#' + selector + '_editor_modal_image').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
        });

        $('#' + selector + '_editor_button_image_insert_preview').click(function() {
          if($('#' + selector + '_editor_image_input').val() != "")
          {
            $('#' + selector + '_editor_image_insert_preview').attr('src', $('#' + selector + '_editor_image_input').val());
          }
          else
          {
            $('#' + selector + '_editor_image_insert_preview').attr('src', 'https://i.ibb.co/QKHTRwr/default-image-insert.jpg');
          }
        });

        $('#' + selector + '_editor_modal_insert_image').one('click', function() {
          if(typeof selection != "undefined" && selection != "")
          {
            old_value = textarea.val();

            replaced_values = old_value.replace(selection, '[img]' + $('#' + selector + '_editor_image_input').val() + '[/img]');

            textarea.val(replaced_values);
          }
          else
          {
            old_value = textarea.val();

            textarea.val(old_value + '[img]' + $('#' + selector + '_editor_image_input').val() + '[/img]');
          }

          $('#' + selector + '_editor_modal_image').modal('hide');
        });
        break;

      case 'media':
        if(typeof selection != "undefined" && selection != "")
        {
          $('#' + selector + '_editor_media_insert_input').val(selection);
        }

        $('#' + selector + '_editor_modal_media').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
        });

        $('#' + selector + '_editor_button_media_insert_preview').click(function() {
          $('#' + selector + '_editor_media_insert_preview').attr('src', embedMedia($('#' + selector + '_editor_media_insert_type').val(), $('#' + selector + '_editor_media_insert_input').val()));
          $('#' + selector + '_editor_media_insert_embed').val(embedMedia($('#' + selector + '_editor_media_insert_type').val(), $('#' + selector + '_editor_media_insert_input').val()));
        });

        $('#' + selector + '_editor_modal_insert_media').one('click', function() {
          $('#' + selector + '_editor_media_insert_embed').val(embedMedia($('#' + selector + '_editor_media_insert_type').val(), $('#' + selector + '_editor_media_insert_input').val()));

          if(typeof selection != "undefined" && selection != "")
          {
            old_value = textarea.val();

            replaced_values = old_value.replace(selection, '[media]' + $('#' + selector + '_editor_media_insert_embed').val() + '[/media]');

            textarea.val(replaced_values);
          }
          else
          {
            old_value = textarea.val();

            textarea.val(old_value + '[media]' + $('#' + selector + '_editor_media_insert_embed').val() + '[/media]');
          }

          $('#' + selector + '_editor_modal_media').modal('hide');
          $('#' + selector + '_editor_media_insert_input').val('');
        });
        break;

      case 'misc':
        $('#' + selector + '_editor_modal_misc').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
        });

        if(typeof options.miscItems == "undefined" || options.miscItems == "")
        {
          for(var i = 0; i < defaults.miscItems.length; i++)
          {
            insertMiscItem(defaults.miscItems[i].toLowerCase(), defaults, options);
          }
        }
        else
        {
          for(var i = 0; i < options.miscItems.length; i++)
          {
            insertMiscItem(options.miscItems[i].toLowerCase(), defaults, options);
          }
        }
        break;

      case 'advcode':
        var advcode_editor = ace.edit(selector + "_editor_advcode_insert_input");

        $('#' + selector + '_editor_modal_advcode').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
        });

        if(typeof selection != "undefined" && selection != "")
        {
          advcode_editor.setValue(selection);
        }

        $('#' + selector + '_editor_advcode_insert_type').click(function() {
          updateAdvancedCodeEditor($('#' + selector + '_editor_advcode_insert_type').val(), defaults, options);
        });

        $('#' + selector + '_editor_modal_insert_advcode').one('click', function() {
          option_value = $('#' + selector + '_editor_advcode_insert_type').val();

          if(typeof selection != "undefined" && selection != "")
          {
            old_value = textarea.val();

            replaced_values = old_value.replace(selection, '\n[advcode=' + option_value +']\n' + advcode_editor.getValue() + '\n[/advcode]\n');

            textarea.val(replaced_values);
          }
          else
          {
            old_value = textarea.val();

            textarea.val(old_value + '[advcode=' + option_value + ']\n' + advcode_editor.getValue() + '\n[/advcode]\n');
          }

          $('#' + selector + '_editor_modal_advcode').modal('hide');
          advcode_editor.setValue('');
        });
        break;
      case 'table':
        var table_rows;
        var table_cols;

        $('#' + selector + '_editor_modal_table').modal({
          show: true,
          backdrop: 'static',
          keyboard: false
        });

        $('#' + selector + '_editor_modal_insert_table').click(function() {
          table_rows = parseInt($('#' + selector + '_editor_table_insert_rows').val());
          table_cols = parseInt($('#' + selector + '_editor_table_insert_cols').val());

          if(Number.isInteger(table_rows) && Number.isInteger(table_cols))
          {
            old_value = textarea.val();

            option_value = '\n[table]\n';

            for(var x = 0; x < table_rows; x++)
            {
              option_value += '  [tr]\n';

              for(var i = 0; i < table_cols; i++)
              {
                option_value += '    [td][/td]\n';
              }

              option_value += '  [/tr]\n';
            }

            option_value += '[/table]';

            old_value = textarea.val();

            textarea.val(old_value + option_value);

            $('#' + selector + '_editor_table_insert_rows').val('');
            $('#' + selector + '_editor_table_insert_cols').val('');
            $('#' + selector + '_editor_modal_table').modal('hide');
          }
        });
        break;
    }
  }

  function buildModal(id, title, body, icon, options, footer = "")
  {
    var modal_template;

    selector = options.selector;

    modal_template = '<div class="modal fade" id="' + selector + '_' + id +'" tabindex="-1" role="dialog" aria-labelledby="' + id + '">';
    modal_template += '<div class="modal-dialog" role="document">';
    modal_template += '<div class="modal-content">';
    modal_template += '<div class="modal-header">';
    modal_template += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">' + icon['close'] + '</span></button>';
    modal_template += '<h4 class="modal-title">' + title + '</h4>';
    modal_template += '</div>';
    modal_template += '<div class="modal-body">';
    modal_template += body;
    modal_template += '</div>';

    if(footer != "")
    {
      modal_template += '<div class="modal-footer">';
      modal_template += footer;
      modal_template += '</div>';
    }

    return modal_template;
  }

  function embedMedia(type, value)
  {
    var default_media_link;
    var new_media_link;
    var media_embed;

    switch(type)
    {
      case 'youtube':
        default_media_link = value.split('/');
          
        if(default_media_link[2] == "www.youtube.com" || default_media_link[2] == "youtube.com")
        {
          new_media_link = default_media_link[default_media_link.length - 1].split('v=');
          media_embed = 'https://www.youtube.com/embed/' + new_media_link[1];
        }
        else
        {
          new_media_link = default_media_link[default_media_link.length - 1];
          media_embed = 'https://www.youtube.com/embed/' + new_media_link.replace('t=', 'start=');
        }

        return media_embed;
        break;
      case 'vimeo':
        default_media_link = value.split('/');
          
        if(default_media_link[2] == "vimeo.com" || default_media_link[2] == "www.vimeo.com")
        {
          new_media_link = default_media_link[default_media_link.length - 1];
          media_embed = 'https://player.vimeo.com/video/' + new_media_link;
        }
        else
        {
          new_media_link = default_media_link[default_media_link.length - 1];
          media_embed = 'https://player.vimeo.com/video/' + new_media_link;
        }

        return media_embed;
        break;
      case 'other':
        media_embed = value;

        return media_embed;
        break;
    }
  }

  function updateAdvancedCodeEditor(value, defaults, options)
  {
    selector = options.selector;

    var advcode_method;
    var advcode_editor;

    switch(value)
    {
      case 'general_code':
        advcode_method = 'text';
        break;
      case 'html':
        advcode_method = 'html';
        break;
      case 'css':
        advcode_method = 'css';
        break;
      case 'javascript':
        advcode_method = 'javascript';
        break;
      case 'php':
        advcode_method = 'php';
        break;
      case 'xml':
        advcode_method = 'xml';
        break;
      case 'json':
        advcode_method = 'json';
        break;
      case 'sql':
        advcode_method = 'sql';
        break;
      case 'ruby':
        advcode_method = 'ruby';
        break;
      case 'python':
        advcode_method = 'python';
        break;
      case 'java':
        advcode_method = 'java';
        break;
      case 'c':
        advcode_method = 'c_cpp';
        break;
      case 'c#':
        advcode_method = 'csharp';
        break;
      case 'c++':
        advcode_method = 'c_cpp';
        break;
      case 'lua':
        advcode_method = 'lua';
        break;
      case 'markdown':
        advcode_method = 'markdown';
        break;
      case 'yaml':
        advcode_method = 'yaml';
        break;
    }

    advcode_editor = ace.edit(selector + "_editor_advcode_insert_input");
    advcode_editor.session.setMode("ace/mode/" + advcode_method);
  }

  function displayMiscItem(value, defaults, options, lang, icon)
  {
    selector = options.selector;

    var output;

    if(typeof options.lang == "undefined" || options.lang == "")
    {
      var lang = $.editor_lang[defaults.lang];
    }
    else
    {
      var lang = $.editor_lang[options.lang];
    }

    switch(value)
    {
      case 'quote':
        output = '<div class="editor_misc_item" id="' + selector + '_editor_misc_item_quote">';

        output += '<p class="editor_misc_item_title">' + lang['others']['blockquote'] + '</p><hr class="divider">';

        output += '<blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p></blockquote>';
        break;
      case 'code':
        output = '<div class="editor_misc_item" id="' + selector + '_editor_misc_item_code">';

        output += '<p class="editor_misc_item_title">' + lang['others']['code'] + '</p><hr class="divider">';

        output += '<pre>&lt;p&gt;Lorem ipsum dolor sit amet...&lt;/p&gt;</pre>';
        break;
      case 'spoiler':
        output = '<div class="editor_misc_item" id="' + selector + '_editor_misc_item_spoiler">';

        output += '<p class="editor_misc_item_title">' + lang['others']['spoiler'] + '</p><hr class="divider">';

        output += '<button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#spoilerExample" aria-expanded="false" aria-controls="spoilerExample">' + icon['spoiler'] + ' Spoiler</button>';

        output += '<div class="collapse editor_misc_item_spoiler_collapse" id="spoilerExample"><div class="well">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dapibus facilisis sodales. Fusce eget libero convallis nunc cursus mattis pharetra non ipsum.</div></div>';
        break;
      case 'linebreak':
        output = '<div class="editor_misc_item" id="' + selector + '_editor_misc_item_linebreak">';

        output += '<p class="editor_misc_item_title">' + lang['others']['linebreak'] + '</p><hr class="divider">';

        output += '<div class="well editor_misc_item_linebreak_well"><hr></div>';
        break;
    }

    output += '</div>';

    return output;
  }

  function insertMiscItem(value, defaults, options)
  {
    selector = options.selector;

    var textarea = $('#' + selector);
    var old_value;

    switch(value)
    {
      case 'quote':
        $('#' + selector + '_editor_misc_item_quote').one('click', function() {
          old_value = textarea.val();

          textarea.val(old_value + '[quote][/quote]');

          $('#' + selector + '_editor_modal_misc').modal('hide');
        });
        break;
      case 'code':
        $('#' + selector + '_editor_misc_item_code').one('click', function() {
          old_value = textarea.val();

          textarea.val(old_value + '[code][/code]');

          $('#' + selector + '_editor_modal_misc').modal('hide');
        });
        break;
      case 'spoiler':
        $('#' + selector + '_editor_misc_item_spoiler').one('click', function() {
          old_value = textarea.val();

          textarea.val(old_value + '[spoiler][/spoiler]');

          $('#' + selector + '_editor_modal_misc').modal('hide');
        });
        break;
      case 'linebreak':
        $('#' + selector + '_editor_misc_item_linebreak').one('click', function() {
          old_value = textarea.val();

          textarea.val(old_value + '[hr]');

          $('#' + selector + '_editor_modal_misc').modal('hide');
        });
        break;
    }
  }

  // Word Counter
  function wordCount(value, maxCharacters)
  {
    var selector = $('#' + value);
    var count = removeBBCode(selector.val()).length;
    var output;

    selector.keyup(function() {
      count = removeBBCode(selector.val()).length;

      output = '<span id="' + value + '_editor_wordcount_output"><span id="' + value + '_editor_wordcount_count">' + count + '</span>/' + maxCharacters + '</span>';

      if(count > maxCharacters || count == maxCharacters)
      {
        $('#' + value + '_editor_footer_word_count').addClass('text-danger');
      }
      else
      {
        $('#' + value + '_editor_footer_word_count').removeClass('text-danger');
      }

      $('#' + value + '_editor_footer_word_count').html(output);
    });
  }

  // On page load word counter
  function defaultWordCounter(value, maxCharacters)
  {
    var selector = $('#' + value);
    var count = removeBBCode(selector.val()).length;
    var output;

    output = '<span id="' + value + '_editor_wordcount_output"><span id="' + value + '_editor_wordcount_count">' + count + '</span>/' + maxCharacters + '</span>';

    if(count > maxCharacters || count == maxCharacters)
    {
      $('#' + value + '_editor_footer_word_count').addClass('text-danger');
    }
    else
    {
      $('#' + value + '_editor_footer_word_count').removeClass('text-danger');
    }

    $('#' + value + '_editor_footer_word_count').html(output);
  }

	// Editor function
  $.fn.wysiwyg_editor = function(options) {
    // Default Settings
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

    // Check Options
    selector = options.selector;

    // Language Setter
    if(typeof options.lang == "undefined" || options.lang == "")
    {
      var lang = $.editor_lang[defaults.lang];
    }
    else
    {
      var lang = $.editor_lang[options.lang];
    }

    // Check Selector
    if(selector == "undefined" || selector == "")
    {
      jQuery.error(lang['']);
    }

    if(typeof options.enableFooter != "undefined")
    {
      if(typeof options.enableFooter != "boolean")
      {
        jQuery.error(lang['errors']['selector']);
      }
    }

    if(typeof options.lang != "undefined")
    {
      if(options.lang == "")
      {
        jQuery.error(lang['errors']['lang']);
      }
    }

    if(typeof options.icons != "undefined")
    {
      if(options.icons == "")
      {
        jQuery.error(lang['errors']['icons']);
      }
    }

    if(typeof options.height != "undefined")
    {
      if(options.height == "")
      {
        jQuery.error(lang['errors']['height']);
      }
    }

    if(typeof options.width != "undefined")
    {
      if(options.width == "")
      {
        jQuery.error(lang['errors']['width']);
      }
    }

    if(typeof options.enableWordCount != "undefined")
    {
      if(typeof options.enableWordCount != "boolean")
      {
        jQuery.error(lang['errors']['selector'].replace('{option}', 'enableWordCount'));
      }
    }

    if(typeof options.maxCharacters != "undefined")
    {
      if(typeof parseInt(options.maxCharacters) != "number")
      {
        jQuery.error(lang['errors']['selector'].replace('{option}', 'maxCharacters'));
      }
      else if(options.maxCharacters <= 0)
      {
        jQuery.error(lang['errors']['max_characters']);
      }
    }

    if(typeof options.enableLinkTarget != "undefined")
    {
      if(typeof options.enableLinkTarget != "boolean")
      {
        jQuery.error(lang['errors']['selector'].replace('{option}', 'enableLinkTarget'));
      }
    }

    if(typeof options.enableImageInsertAlert != "undefined")
    {
      if(typeof options.enableImageInsertAlert != "boolean")
      {
        jQuery.error(lang['errors']['selector'].replace('{option}', 'enableImageInsertAlert'));
      }
    }

    if(typeof options.enableMediaPreview != "undefined")
    {
      if(typeof options.enableImagePreview != "boolean")
      {
        jQuery.error(lang['errors']['selector'].replace('{option}', 'enableImagePreview'));
      }
    }

    if(typeof options.enableMediaPreview != "undefined")
    {
      if(typeof options.enableMediaPreview != "boolean")
      {
        jQuery.error(lang['errors']['selector'].replace('{option}', 'enableMediaPreview'));
      }
    }

    if(typeof options.advancedCodeEditorTheme != "undefined")
    {
      if(options.advancedCodeEditorTheme == "")
      {
        jQuery.error(lang['errors']['theme']);
      }
    }

  	// Editor variable
  	var editor = $(this);

    // Editor variables
    var editor_class = "wysiwyg_editor";
    var template
    var template_head;
    var template_body;
    var template_footer;
    var footer_template;
    var count_buttons;
    var option_buttons_type;
    var head_toolbar;
    var head_group;
    var maxCharacters;

    // Icon Setter
    if(typeof options.icons == "undefined" || options.icons == "")
    {
      var icon = $.editor_icon[defaults.icons];
    }
    else
    {
      var icon = $.editor_icon[options.icons];
    }

    // Template Builder
    editor.each(function() {
      // Template Variable
      template = editor;

      // Editor constructer
      template.addClass(editor_class);

      if(typeof options.width == "undefined" || options.width == "")
      {
        if(typeof defaults.width == "number")
        {
          template.css('width', defaults.width);
        }
      }
      else
      {
        if(typeof options.width == "number")
        {
          template.css('width', options.width);
        }
      }

      // Template Boxes
      template.append('<div class="wysiwyg_editor_head" id="' + selector +'_wysiwyg_editor_head"></div>');
      template.append('<div class="wysiwyg_editor_body" id="' + selector +'_wysiwyg_editor_body"></div>');

      // Enable footer option & footer box
      if(typeof options.enableFooter == "undefined")
      {
        if(defaults.enableFooter === true)
        {
          template.append('<div class="wysiwyg_editor_footer" id="' + selector +'_wysiwyg_editor_footer"></div>');
        }
      }
      else
      {
        if(options.enableFooter === true)
        {
          template.append('<div class="wysiwyg_editor_footer" id="' + selector +'_wysiwyg_editor_footer"></div>');
        }
      }

      // Create Div for Modals
      template.append('<div class="wysiwyg_editor_modals" id="' + selector +'_wysiwyg_editor_modals"></div>');

      // Constructor variables
      template_head = $('#' + selector + '_wysiwyg_editor_head');
      template_body = $('#' + selector + '_wysiwyg_editor_body');
      template_footer = $('#' + selector + '_wysiwyg_editor_footer');

      // Head Constructor
      option_buttons_type = typeof options.includedButtons;

      if(option_buttons_type == "undefined" || options.includedButtons == "")
      {
        count_buttons = defaults.includedButtons.length;

        template_head.append('<div class="btn-toolbar wysiwyg_editor_head_toolbar" id="' + selector + '_wysiwyg_editor_head_toolbar" role="toolbar">');

        head_toolbar = $('#' + selector + '_wysiwyg_editor_head_toolbar');

        for(var i = 0; i < count_buttons; i++)
        {
          if(defaults.includedButtons[i].length > 1)
          {
            head_toolbar.append('<div class="btn-group wysiwyg_editor_head_group" id="' + selector + '_editor_head_group_' + i + '" role="group">');

            head_group = $('#' + selector + '_editor_head_group_' + i);
            
            for(var z = 0; z < defaults.includedButtons[i].length; z++)
            {
              head_group.append(displayButton(defaults.includedButtons[i][z], defaults, options, lang, icon));
            }
            
            head_toolbar.append('</div>');
          }
          else
          {
            head_toolbar.append(displayButton(defaults.includedButtons[i][0], defaults, options, lang, icon));
          }
        }

        template_head.append('</div>');
      }
      else
      {
        count_buttons = options.includedButtons.length;

        template_head.append('<div class="btn-toolbar wysiwyg_editor_head_toolbar" id="' + selector + '_wysiwyg_editor_head_toolbar" role="toolbar">');

        head_toolbar = $('#' + selector + '_wysiwyg_editor_head_toolbar');

        for(var i = 0; i < count_buttons; i++)
        {
          head_toolbar.append('<div class="btn-group wysiwyg_editor_head_group" id="' + selector + '_editor_head_group_' + i + '" role="group">');

            head_group = $('#' + selector + '_editor_head_group_' + i);
          
          for(var z = 0; z < options.includedButtons[i].length; z++)
          {
            head_group.append(displayButton(options.includedButtons[i][z], defaults, options, lang, icon));

            buttonAction(options.includedButtons[i][z]);
          }
          
          head_toolbar.append('</div>');
        }

        template_head.append('</div>');
      }

      // Body Constructor
      if(typeof options.height == "undefined" || options.height == "")
      {
        if(typeof options.defaultValue == "undefined" || options.defaultValue == "")
        {
          if(typeof defaults.height == "string")
          {
            if(defaults.height == "auto")
            {
              template_body.append('<textarea class="wysiwyg_editor_textarea" id="' + selector + '  "' + defaults.defaultValue + '"></textarea>');
            }
          }
          else if(typeof defaults.height == "number")
          {
            template_body.append('<textarea class="wysiwyg_editor_textarea" id="' + selector + '"' + defaults.defaultValue + '"></textarea>');
            $('#' + selector).css('height', defaults.height);
          }
        }
        else
        {
          if(typeof defaults.height == "string")
          {
            if(defaults.height == "auto")
            {
              template_body.append('<textarea class="wysiwyg_editor_textarea" id="' + selector + ' "' + selector + '">' + options.defaultValue + '</textarea>');
            }
          }
          else if(typeof defaults.height == "number")
          {
            template_body.append('<textarea class="wysiwyg_editor_textarea" id="' + selector + '"' + selector + '">' + options.defaultValue + '</textarea>');

            $('#' + selector).css('height', defaults.height);
          }
        }
      }
      else
      {
        if(typeof options.defaultValue == "undefined" || options.defaultValue == "")
        {
          if(typeof options.height == "string")
          {
            if(options.height == "auto")
            {
              template_body.append('<textarea class="wysiwyg_editor_textarea" id="' + selector + '"' + selector + '"></textarea>');
            }
          }
          else if(typeof options.height == "number")
          {
            template_body.append('<textarea class="wysiwyg_editor_textarea" id="' + selector + '"' + defaults.defaultValue + '"></textarea>');

            $('#' + selector).css('height', options.height);
          }
        }
        else
        {
          if(typeof options.height == "string")
          {
            if(options.height == "auto")
            {
              template_body.append('<textarea class="wysiwyg_editor_textarea" id="' + selector + '"' + selector + '">' + selector + '</textarea>');
            }
          }
          else if(typeof options.height == "number")
          {
            template_body.append('<textarea class="wysiwyg_editor_textarea" id="' + selector + '"' + selector + '">' + options.defaultValue + '</textarea>');

            $('#' + selector).css('height', options.height);
          }
        }
      }

      // Footer Constructer
      if(typeof options.enableFooter == "undefined" || options.enableFooter == "")
      {
        if(defaults.enableFooter === true)
        {
          if(defaults.enableWordCount === false)
          {
            template_footer.append('<div class="row"><div class="col-md-12"><p class="wysiwyg_editor_footer_text">' + lang['others']['created_by'] + ' <a href="https://github.com/MrAnonymusz" target="_blank">MrAnonymusz</a>.</p></div></div>');
          }
          else if(defaults.enableWordCount === true)
          {
            template_footer.append('<div class="row">');

            template_footer.append('<div class="col-md-6"><p class="wysiwyg_editor_footer_text">' + lang['others']['created_by'] + ' <a href="https://github.com/MrAnonymusz" target="_blank">MrAnonymusz</a>.</p></div>');
            template_footer.append('<div class="col-md-6"><p class="wysiwyg_editor_footer_word_count" id="' + selector + '_editor_footer_word_count">' + wordCount(selector, defaults.maxCharacters) + '</p></div>');

            defaultWordCounter(selector, defaults.maxCharacters);

            template_footer.append('</div>');
          }
        }
      }
      else
      {
        if(options.enableFooter === true)
        {
          if(typeof options.enableWordCount == "undefined" || options.enableWordCount == "")
          {
            if(defaults.enableWordCount === false)
            {
              footer_template = '<div class="row"><div class="col-md-12"><p class="wysiwyg_editor_footer_text">' + lang['others']['created_by'] + ' <a href="https://github.com/MrAnonymusz" target="_blank">MrAnonymusz</a>.</p></div></div>';

              template_footer.append(footer_template);

              $('.wysiwyg_editor_footer_text').css('text-align', 'center');
            }
            else if(defaults.enableWordCount === true)
            {
              if(typeof options.maxCharacters == "undefined" || options.maxCharacters == "")
              {
                maxCharacters = defaults.maxCharacters;

                footer_template = '<div class="row">';

                footer_template += '<div class="col-md-6"><p class="wysiwyg_editor_footer_text">' + lang['others']['created_by'] + ' <a href="https://github.com/MrAnonymusz" target="_blank">MrAnonymusz</a>.</p></div>';
                footer_template += '<div class="col-md-6"><p class="wysiwyg_editor_footer_word_count" id="' + selector + '_editor_footer_word_count">' + wordCount(selector, maxCharacters) + '</p></div>';

                footer_template += '</div>';

                template_footer.append(footer_template);

                defaultWordCounter(selector, defaults.maxCharacters);
              }
              else
              {
                maxCharacters = options.maxCharacters;

                footer_template = '<div class="row">';

                footer_template += '<div class="col-md-6"><p class="wysiwyg_editor_footer_text">' + lang['others']['created_by'] + ' <a href="https://github.com/MrAnonymusz" target="_blank">MrAnonymusz</a>.</p></div>';
                footer_template += '<div class="col-md-6"><p class="wysiwyg_editor_footer_word_count" id="' + selector + '_editor_footer_word_count">' + wordCount(selector, maxCharacters) + '</p></div>';

                footer_template += '</div>';

                template_footer.append(footer_template);

                defaultWordCounter(selector, defaults.maxCharacters);
              }
            }
          }
          else
          {
            if(options.enableWordCount === false)
            {
              footer_template = '<div class="row"><div class="col-md-12"><p class="wysiwyg_editor_footer_text">' + lang['others']['created_by'] + ' <a href="https://github.com/MrAnonymusz" target="_blank">MrAnonymusz</a>.</p></div></div>';

              template_footer.append(footer_template);

              $('.wysiwyg_editor_footer_text').css('text-align', 'center');
            }
            else if(options.enableWordCount === true)
            {
              if(typeof options.maxCharacters == "undefined" || options.maxCharacters == "")
              {
                maxCharacters = defaults.maxCharacters;

                footer_template = '<div class="row">';

                footer_template += '<div class="col-md-6"><p class="wysiwyg_editor_footer_text">' + lang['others']['created_by'] + ' <a href="https://github.com/MrAnonymusz" target="_blank">MrAnonymusz</a>.</p></div>';
                footer_template += '<div class="col-md-6"><p class="wysiwyg_editor_footer_word_count" id="' + selector + '_editor_footer_word_count">' + wordCount(selector, maxCharacters) + '</p></div>';

                footer_template += '</div>';

                template_footer.append(footer_template);

                defaultWordCounter(selector, defaults.maxCharacters);
              }
              else
              {
                maxCharacters = options.maxCharacters;

                footer_template = '<div class="row">';

                footer_template += '<div class="col-md-6"><p class="wysiwyg_editor_footer_text">' + lang['others']['created_by'] + ' <a href="https://github.com/MrAnonymusz" target="_blank">MrAnonymusz</a>.</p></div>';
                footer_template += '<div class="col-md-6"><p class="wysiwyg_editor_footer_word_count" id="' + selector + '_editor_footer_word_count">' + wordCount(selector, maxCharacters) + '</p></div>';

                footer_template += '</div>';

                template_footer.append(footer_template);

                defaultWordCounter(selector, defaults.maxCharacters);
              }
            }
          }
        }
      }

      // Button action triggers
      $('#' + selector + '_editor_button_bold').click(function() {
        buttonAction('bold', defaults, options);
      });
      $('#' + selector + '_editor_button_italic').click(function() {
        buttonAction('italic', defaults, options);
      });
      $('#' + selector + '_editor_button_underline').click(function() {
        buttonAction('underline', defaults, options);
      });
      $('#' + selector + '_editor_button_strikethrough').click(function() {
        buttonAction('strikethrough', defaults, options);
      });
      $('#' + selector + '_editor_button_superscipt').click(function() {
        buttonAction('superscript', defaults, options);
      });
      $('#' + selector + '_editor_button_subscript').click(function() {
        buttonAction('subscript', defaults, options);
      });
      $('#' + selector + '_editor_button_font_name').click(function() {
        buttonAction('font-name', defaults, options);
      });
      $('#' + selector + '_editor_button_font_size').click(function() {
        buttonAction('font-size', defaults, options);
      });
      $('#' + selector + '_editor_button_color').click(function() {
        buttonAction('color', defaults, options);
      });
      $('#' + selector + '_editor_button_unordered_list').click(function() {
        buttonAction('unordered-list', defaults, options);
      });
      $('#' + selector + '_editor_button_ordered_list').click(function() {
        buttonAction('ordered-list', defaults, options);
      });
      $('#' + selector + '_editor_button_align').click(function() {
        buttonAction('align', defaults, options);
      });
      $('#' + selector + '_editor_button_link').click(function() {
        buttonAction('link', defaults, options);
      });
      $('#' + selector + '_editor_button_image').click(function() {
        buttonAction('image', defaults, options);
      });
      $('#' + selector + '_editor_button_media').click(function() {
        buttonAction('media', defaults, options);
      });
      $('#' + selector + '_editor_button_misc').click(function() {
        buttonAction('misc', defaults, options);
      });
      $('#' + selector + '_editor_button_advcode').click(function() {
        buttonAction('advcode', defaults, options);
      });
      $('#' + selector + '_editor_button_table').click(function() {
        buttonAction('table', defaults, options);
      });
    });
  };
}(jQuery));