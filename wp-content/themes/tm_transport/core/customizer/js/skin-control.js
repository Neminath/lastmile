( function( api, $ ) {
	var colorSettings = [ 'show_on_front' ];

	api.controlConstructor.select = api.Control.extend( {
		ready: function() {
			if ( 'skin' === this.id ) {
				this.setting.bind( 'change', function( value ) {
					var tmValue = api.control( 'skin' ).settings.default._tmValue;
					if ( 'Custom' !== value && value != tmValue ) {
						if ( ! confirm( 'When you select other skin, your customized settings will be replaced with settings of the selected skin. Do you want to do that?' ) ) {
							api( 'skin', function ( objVal ) {
								objVal( tmValue );
							} );
						} else {
							var $select = api.control( 'skin' ).container.find( 'select'),
								$spinner = $( '<span class="spinner is-active"></span>' );

							$select.prop( 'disabled', true );
							$spinner.insertAfter( $select );

							$.post( ajaxurl, {
								action: 'tm_customizer_select_skin',
								skin: value
							}, function ( response ) {
								api.state('saved').set(true);
								location.reload();
							} );
						}
					}
				});
			}
		}
	} );

	api.bind( 'change', function ( value ) {
		if ( 'skin' !== value.id ) {
			api( 'skin' ).set( 'Custom' );
		}
	} );

	api( 'skin', function ( value ) {
		value._tmValue = value();
	} );
} )( wp.customize, jQuery );
