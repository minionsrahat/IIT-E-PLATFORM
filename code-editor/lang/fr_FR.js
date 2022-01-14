/*
  >> Credits
    >> Author: fightmaxime
    >> Contact Link: http://maximemichaud.me
*/
(function($) {
	$.extend($.editor.lang, {
		'fr-FR': {
			font: {
				bold: 'Gras',
				italic: 'Italique',
				underline: 'Souligner',
				strikethrough: 'Barré',
				supperscript: 'Exposant',
				subscript: 'Indice',
				font-name: 'Famille de polices',
				font-size: 'Taille de police',
				color: {
					button: 'Couleur',
					modal: 'Pipette de Couleurs'
				}
			},
			text: {
				unordered-list: 'Liste Non Ordonnée',
				ordered-list: 'Liste Ordonnée',
				align: {
					button: 'Aligné',
					left: 'Gauche',
					center: 'Centre',
					right: 'Droite'
				}
			},
			inserts: {
				link: {
					button: 'Lien',
					modal: 'Insérer lien',
					target: 'Ouvrir dans une nouvelle fenêtre'
				}
				image: {
					button: 'Image',
					site: 'Si vous recherchez un site Web sur lequel vous pouvez upload des images, insérez-les <a href="https://imgur.com/" class="alert-link" target="_blank">ici</a>.',
					modal: 'Insérer une image'
				}
				media: {
					button: 'Média',
					modal: 'Insérer un média'
				}
				misc: {
					button: 'Divers',
					modal: 'Divers',
				},
				advcode: {
					button: 'Code Avancé',
					modal: 'Code Avancé'
				},
				table: {
					button: 'Tableau',
					modal: 'Insérer un tableau',
					rows: 'Rangées de tableau',
					cols: 'Colonne Tableau'
				}
			},
			preview: {
				button: 'Aperçu',
				modal: 'Aperçu'
			},
			others: {
				blockquote: 'Bloc de citation',
				code: 'Code simple',
				spoiler: 'Spoiler',
				linebreak: 'Saut de ligne',
				created_by: 'Editeur créé par'
			},
			insert: 'Insérer',
			other: 'Autre',
			errors: {
			  selector: 'S\'il vous plaît spécifier un sélecteur !',
			  invalid_value: "Valeur invalide pour l'option '{option}'!",
			  lang: 'Veuillez spécifier une langue pour l\'éditeur !',
			  icons: 'Veuillez spécifier un pack d\'icônes pour l\'éditeur !',
			  height: 'S\'il vous plaît spécifier une hauteur pour l\'éditeur !',
			  width: 'S\'il vous plaît spécifier une largeur pour l\'éditeur !',
			  max_characters: "La valeur de l'option 'maxCharacters' doit être supérieure à 0 !",
			  theme: 'Veuillez spécifier un thème pour l\'éditeur de code avancé !'
			}
		}
	});
})(jQuery);