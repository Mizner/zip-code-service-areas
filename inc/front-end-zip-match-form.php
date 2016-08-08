<?php
function zcsa_front_end_check() {

	if ( is_page( "service-request-page" ) ) :




		?>
		<input id="zipInput" type="text" pattern="[0-9]{5}" name="zipcode" maxlength="5" required>
		<button id="zipFormSubmit" type="submit">Check</button>

		<form id="theForm" action="" style="max-width: 300px">
			<h2>Form Example</h2>
			<label for="">Thing</label>
			<br>
			<input type="text">
			<br>
			<label for="">Thing</label>
			<br>
			<input type="text">
			<br>
			<label for="">Thing</label>
			<br>
			<input type="text">
			<br>
			<label for="">Thing</label>
			<br>
			<input type="text">
		</form>


	<?php else:
	endif;
}
