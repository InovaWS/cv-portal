(function($, window, undefined) {
	
	$(function() {
		var selectEstadoChanged = function(selectEstado) {
			$selectEstado = $(selectEstado);
			$selectCidades = $($selectEstado.data('select-cidades'));
			
			$selectCidades.find('option[value!=""]').remove();
			
			if ($selectEstado.val()) {
				$selectCidades.stop(true, true).fadeTo(400, .5, function() {
					$.get(urlFor('/cidades', {id_uf: $selectEstado.val()}), function(result) {
						for (var i = 0; i < result.length; ++i) {
							var $option = $('<option>').attr('value', result[i].id).text(result[i].nome);
							$selectCidades.append($option);
						}
						$selectCidades.stop(true, true).fadeTo(400, 1);
					});
				});
			}
		};
		
		$(window.document).on('change keyup', '[data-select-cidades]', function(event) {selectEstadoChanged(this);});
		$('[data-select-cidades]').each(function () {selectEstadoChanged(this);});
		
		var onTipoVendedorChange = function() {
			var tipo = $('#id_tipo_vendedor_fisico').is(':checked') ? 'fisico' : 'juridico';
			
			$('#tipo_vendedor_fisico')[tipo == 'fisico' ? 'show' : 'hide']();
			$('#tipo_vendedor_juridico')[tipo == 'juridico' ? 'show' : 'hide']();
		};
		
		$(document).on('change click', '#id_tipo_vendedor_fisico, #id_tipo_vendedor_juridico', function(event) { onTipoVendedorChange(); });
		onTipoVendedorChange();
		
		$('[data-toggle=popover]').popover({html: true, trigger: 'focus'});

		
	});
	
})(jQuery, window);