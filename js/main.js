(function($, window, undefined) {
	
	$(function() {
		// Menu collapse
		if (window.matchMedia) {
			var onMediaQueryChange = function(mq) {
				if (mq.matches) {
					$('#main-header #header-links ul').removeClass('normal').addClass('dropdown-menu');
				}
				else {
					$('#main-header #header-links ul').addClass('normal').removeClass('dropdown-menu');
				}
			};
			
			var mq = window.matchMedia("(max-width: 639px)");
			mq.addListener(onMediaQueryChange);
			onMediaQueryChange(mq);
		}
		
		var onTipoVendedorChange = function() {
			var tipo = $('#id_tipo_vendedor_fisico').is(':checked') ? 'fisico' : 'juridico';
			
			$('#tipo_vendedor_fisico')[tipo == 'fisico' ? 'show' : 'hide']();
			$('#tipo_vendedor_juridico')[tipo == 'juridico' ? 'show' : 'hide']();
		};
		
		$(document).on('change click', '#id_tipo_vendedor_fisico, #id_tipo_vendedor_juridico', function(event) { onTipoVendedorChange(); });
		onTipoVendedorChange();
		
		$('[data-toggle=popover]').popover({html: true, trigger: 'focus'});

		var onUFChange = function() {
			var $uf = $('#uf');
			var $cidade = $('#cidade');
			
			$cidade.find('option[value!=""]').remove();
			
			if ($uf.val()) {
				$cidade.stop(true, true).fadeTo(400, .5, function() {
					$.get(url('/cidades/' + $uf.val()), function(result) {
						for (var i = 0; i < result.length; ++i) {
							var $option = $('<option>').attr('value', result[i].id).text(result[i].nome);
							$cidade.append($option);
						}
						$cidade.stop(true, true).fadeTo(400, 1);
					});
				});
			}
		};
		
		$(document).on('change keyup', '#uf', function(event) { onUFChange(); });
		if ($('#cidade option').size() == 1)
			onUFChange();
	});
	
})(jQuery, window);