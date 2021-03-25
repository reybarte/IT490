<?php
require("MQFunctions/apiCall.php");
if(isset($_POST["request"])) {
	apiCall($_POST["asin"]);

} elseif ($_POST["roleChange"]) {
	roleChange($_POST["email"], $_POST["role"]);
}
?>
<form method="POST" action="admin.php">
	<input type="text" name="asin" placeholder="Enter ASIN number"/> 
	<button type="submit" name="request">Find Product</button>
</form>
<br>
<form method="POST" action = "admin.php">
	<input type="text" name="email" placeholder="Enter user email"/>
	<input type="radio" id="cl" name="role" value="cl">
	<label for="age1">Client</label>
	<input type="radio" id="pm" name="role" value="pm">
	<label for="age2">Product Manager</label> 
	<input type="radio" id="ad" name="role" value="ad">
	<label for="age3">Admin</label><br>
	<button type="submit" name="roleChange">Change Role</button>

</form>
