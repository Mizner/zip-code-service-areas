<?php
function zcsa_front_end_check() {

	if ( is_page( "service-request-page" ) ) :
		?>
		<input id="zipInput" type="text" pattern="[0-9]{5}" name="zipcode" maxlength="5" required>
		<button id="zipFormSubmit" type="submit">Check</button>
	<?php else:
	endif;
}
