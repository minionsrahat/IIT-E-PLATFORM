/*
  >> Credits
    >> Author: Xu_wznln
    >> Contact Link: Xu_wznln#7001 (Discord Tag)
*/
(function($) {
	$.extend($.editor_lang, {
		'zh_CN': {
			font: {
				bold: '加粗',
				italic: '倾斜',
				underline: '下划线',
				strikethrough: '删除线',
				supperscript: '上标',
				subscript: '下标',
				font_name: '字体',
				font_size: '字体大小',
				color: {
					button: '颜色',
					modal: '选择颜色'
				}
			},
			text: {
				unordered_list: '无序列表',
				ordered_list: '有序列表',
				align: {
					button: '对齐方式',
					left: '左',
					center: '居中',
					right: '右'
				}
			},
			inserts: {
				link: {
					button: '链接',
					modal: '插入链接',
					site: '如果你想上传图片并获取图片外链，请点击 <a href="https://imgur.com/" class="alert-link" target="_blank">此处</a>。',
					target: '新窗口打开'
				},
				image: {
					button: '图片',
					modal: '插入图片'
				},
				media: {
					button: '媒体',
					modal: '插入媒体文件'
				},
				misc: {
					button: '其他',
					modal: '其他',
				},
				advcode: {
					button: '高级代码',
					modal: '高级代码'
				},
				table: {
					button: '表格',
					modal: '插入表格',
					rows: '行',
					cols: '列'
				}
			},
			preview: {
				button: '预览',
				modal: '预览'
			},
			others: {
				blockquote: '引用',
				code: '代码',
				spoiler: '隐藏文字',
				linebreak: '分割线',
				created_by: '创建者：'
			},
			insert: '插入',
			other: '其他',
			errors: {
			  selector: '请指定选择器！',
			  invalid_value: "选项 '{option}' 的值不正确！",
			  lang: '请指定编辑器的语言！',
			  icons: '请指定编辑器的图标！',
			  height: '请指定编辑器的高度！',
			  width: '请指定编辑器的宽度！',
			 	max_characters: "选项 'maxCharacters' 的值必须比0大！",
			  theme: '请选择高级代码编辑器的主题！'
			}
		}
	});
})(jQuery);
