(function($) {
	$.extend($.editor_lang, {
		'hu-HU': {
			font: {
				bold: 'Félkövér',
				italic: 'Dőlt',
				underline: 'Aláhúzott',
				strikethrough: 'Áthúzott',
				supperscript: 'Superscript',
				subscript: 'Subscript',
				font_name: 'Szöveg Stílus',
				font_size: 'Betűméret',
				color: {
					button: 'Szín',
					modal: 'Szín Választó'
				}
			},
			text: {
				unordered_list: 'Listajeles lista',
				ordered_list: 'Számozott lista',
				align: {
					button: 'Elhelyezés',
					left: 'Igazítás balra',
					center: 'Igazítás középre',
					right: 'Igazítás jobbra'
				}
			},
			inserts: {
				link: {
					button: 'Link',
					modal: 'Link beszúrása',
					target: 'Megnyitás egy új ablakban'
				},
				image: {
					button: 'Kép',
					site: 'Ha keresel egy olyan helyet ahová fel tudsz tölteni képeket kattints <a href="https://imgur.com/" class="alert-link" target="_blank">ide</a>.',
					modal: 'Kép beszúrása'
				},
				media: {
					button: 'Média',
					modal: 'Média beszúrása'
				},
				misc: {
					button: 'Több',
					modal: 'Több bbkód',
				},
				advcode: {
					button: 'Fejlett Kód',
					modal: 'Fejlett Kód'
				},
				table: {
					button: 'Tábla',
					modal: 'Tábla beszúrása',
					rows: 'Table Rows',
					cols: 'Table Columns'
				}
			},
			preview: {
				button: 'Megtekintés',
				modal: 'Megtekintés'
			},
			others: {
				blockquote: 'Blockquote',
				code: 'Szimpla Kód',
				spoiler: 'Spoiler',
				linebreak: 'Vonaltörés',
				created_by: 'Szerkesztőt készitette'
			},
			insert: 'Beszúrása',
			other: 'Egébb',
			errors: {
				selector: 'Kérlek adj meg egy kiválasztót (selector)!',
				invalid_value: "Érvénytelen értek ennek az opciónak '{option}'!",
				lang: 'Kérlek válasz ki egy nyelvet a szerkesztőnek!',
				icons: 'Kérlek válasz ki egy ikon szetzet a szerkesztőnek!',
				height: 'Kérlek adj meg egy magasságot a szerkesztőnek!',
				width: 'Kérlek adj meg egy szélességet a szerkesztőnek!',
				max_characters: "A 'maxCharacters' opció értéke nagyobb kell legyen 0-tól!",
				theme: 'Kérlek válasz ki egy témát a fejlett kódszerkesztő-nek!'
			}
		}
	});
})(jQuery);