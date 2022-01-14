/*
  >> Credits
    >> Author: </Aco>
    >> Contact Link: </Aco>#0001 (Discord Tag)
*/
(function($) {
	$.extend($.editor_lang, {
		'es-ES': {
			font: {
				bold: 'Negrita',
				italic: 'Cursiva',
				underline: 'Subrayada',
				strikethrough: 'Tachado',
				supperscript: 'Sobrescrita',
				subscript: 'Subíndice',
				font_name: 'Familia tipográfica',
				font_size: 'Tamaño de fuente',
				color: {
					button: 'Color',
					modal: 'Selector de color'
				}
			},
			text: {
				unordered_list: 'Lista desordenada',
				ordered_list: 'Lista ordenada',
				align: {
					button: 'Alineación',
					left: 'Izquierda',
					center: 'Centro',
					right: 'Derecha'
				}
			},
			inserts: {
				link: {
					button: 'Link',
					modal: 'Inserta Link',
					target: 'Abrir en Nueva ventana'
				},
				image: {
					button: 'Imagen',
					site: 'Si está buscando un sitio web donde pueda cargar imágenes, insértelas aquí, haga click en <a href="https://imgur.com/" class="alert-link" target="_blank">here</a>.',
					modal: 'Insertar Image'
				},
				media: {
					button: 'Media',
					modal: 'Insertar Media'
				},
				misc: {
					button: 'Miscelánea',
					modal: 'Miscelánea',
				},
				advcode: {
					button: 'Código avanzado',
					modal: 'Código avanzado'
				},
				table: {
					button: 'Tabla',
					modal: 'Insertar Tabla',
					rows: 'Filas de Tabla',
					cols: 'Columnas de Tabla'
				}
			},
			preview: {
				button: 'Avance',
				modal: 'Avance'
			},
			others: {
				blockquote: 'Blockquote',
				code: 'Código simple',
				spoiler: 'Spoiler',
				linebreak: 'Linebreak',
				created_by: 'Editor creado por'
			},
			insert: 'Insertar',
			other: 'Otro',
			errors: {
     		selector: 'Por favor especifica un selector',
			  invalid_value: "Valor invalido para la opcion '{option}'!",
			  lang: 'Por favor especifique un lenguaje para el editor!',
			  icons: 'Por favor seleccione un Icono para el editor',
			  height: 'Por favor especifique la altura para el editor',
			  width: 'Por favor especifique la anchura para el editor',
			  max_characters: "El valor para la opción 'maxCharacters' debe ser mayor que 0!",
			  theme: 'Por favor, especifique un tema para el editor de código avanzado!'
			}
		}
	});
})(jQuery);
