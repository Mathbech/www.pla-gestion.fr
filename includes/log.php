<?php
function isloggedin(): bool{
	return !empty($session['id_user'])? true : false;
}
?>