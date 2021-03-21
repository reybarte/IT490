<?php
require("MQFunctions/apiCall.php");
if(isset($_POST["request"])) {
	apiCall($_POST["asin"]);
	
}
?>
<form method="post" action="admin.php">
        <input type="text" name="asin" placeholder="Enter ASIN number"/> 
	<button type="submit" name="request">Find Product</button>
</form>

