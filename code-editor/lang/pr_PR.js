/*
  >> Credits
    >> Author: </Aco>
    >> Contact Link: </Aco>#0001 (Discord Tag)
*/
(function($) {
	$.extend($.editor_lang, {
		'pr-PR': {
			font: {
				bold: 'Negrito',
				italic: 'Cursivo',
				underline: 'Sublinhado',
				strikethrough: 'Listrado',
				supperscript: 'Sobrescrito',
				subscript: 'Subíndice',
				font_name: 'Nome da fonte',
				font_size: 'Tamanho da fonte',
				color: {
					button: 'Cor',
					modal: 'seletor de cores'
				}
			},
			text: {
				unordered_list: 'Lista bagunçada',
				ordered_list: 'Lista ordenada',
				align: {
					button: 'Alinhamento',
					left: 'Esquerda',
					center: 'Centro',
					right: 'Direita'
				}
			},
			inserts: {
				link: {
					button: 'Link',
					modal: 'Inserir Link',
					target: 'Abrir em nova janela'
				},
				image: {
					button: 'Imagem',
					site: 'Se você estiver procurando por um site onde possa enviar imagens, insira-as aqui, clique em <a href="https://imgur.com/" class="alert-link" target="_blank">here</a>.',
					modal: 'Inserir imagem'
				},
				media: {
					button: 'Mídia',
					modal: 'Inserir mídia'
				},
				misc: {
					button: 'Diversos',
					modal: 'Diversos',
				},
				advcode: {
					button: 'Código avançado',
					modal: 'Código avançado'
				},
				table: {
					button: 'Tabela',
					modal: 'Inserir tabela',
					rows: 'linhas de tabela',
					cols: 'Colunas da tabela'
				}
			},
			preview: {
				button: 'Avançar',
				modal: 'Avançar'
			},
			others: {
				blockquote: 'Blockquote',
				code: 'Código simples',
				spoiler: 'Spoiler',
				linebreak: 'Linebreak',
				created_by: 'Editor criado por'
			},
			insert: 'Inserir',
			other: 'Outro',
			errors: {
	    	selector: 'Por favor, especifique um seletor',
			  invalid_value: "Valor inválido para a opção '{option}'!",
			  lang: 'Por favor, especifique um idioma para o editor!',
			  icons: 'Por favor, selecione um ícone para o editor',
			  height: 'Por favor, especifique a altura para o editor',
			  width: 'Por favor, especifique a largura para o editor',
			  max_characters: "O valor da opção 'maxCharacters' deve ser maior que 0!",
			  theme: 'Por favor, especifique um tema para o editor de código avançado!'
			}
		}
	});
})(jQuery);
