<?php
function crimson_custom_handlebars( array $matches = array() ) {

	if (isset($matches[1])) {
		$key = strtolower( $matches[1] );

		switch ($key) {
			// Get the step number of the post
			case 'c1p-step-number':
				return get_field( 'step_number', get_the_ID() );
				break;

			// Get the tab ID the post
			case 'c1p-tab-id':
				return get_field( 'tab_id', get_the_ID() );
				break;

			// Get the active tab classes of the post
			case 'c1p-active-classes':
				return get_field( 'active_tab', get_the_ID() );
				break;

			// default value
			default:
				if (isset($matches[0])) {
					return $matches[0];
				}
				return false;
				break;
		}

	}
	return false;
}
?>