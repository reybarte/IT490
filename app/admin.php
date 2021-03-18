<?php

if(isset($_POST["request"])) {
	apiCall($_POST["asin"]);
	
}
<form method="post" action="admin.php"> 
        <input type="text" name="asin" class="button" value="Request API Call"/> 
</form>

?>
