<?php
//using this to aggregate all the functions coded
//the purpose of this is to give those with minimal PHP knowledge a way
//to divide up code and assign to different team members without having too many hurdles

require(__DIR__ . "/MQFunctions/login.php");
require(__DIR__ . "/MQFunctions/register.php");
require(__DIR__ . "/MQFunctions/apiCall.php");
require(__DIR__ . "/MQFunctions/roleChange.php");
require(__DIR__ . "/MQFunctions/getCache.php");
require(__DIR__ . "/MQFunctions/logout.php");
require(__DIR__ . "/MQFunctions/transaction.php");
require(__DIR__ . "/MQFunctions/remove.php");
require(__DIR__ . "/MQFunctions/tracking.php");
require(__DIR__ . "/MQFunctions/getTrackingInfo.php");
require(__DIR__ . "/MQFunctions/getTransactionHistory.php");
require(__DIR__ . "/MQFunctions/updateStock.php");
require(__DIR__ . "/MQFunctions/editProfile.php");
require(__DIR__ . "/MQFunctions/getTrackingStats.php");
//TODO include other functions here as they're developed
//TODO include only this file when you need to use any of the functions
