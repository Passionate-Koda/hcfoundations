<?php
#Define App Path
define("APP_PATH", dirname(dirname(__FILE__)));
#load database
#load Controllers(functions)
require APP_PATH."/demo_models/model.php";
require APP_PATH."/v1/controllers/controller.php";
require APP_PATH."/demo_controllers/controller.php";
require APP_PATH."/controller/controller.php";

// include DB_PATH."/demo_models/model.php";
#load routes
require APP_PATH."/demo_routes/router.php";




require APP_PATH."/v1/routes/admin_router.php";
require APP_PATH."/v1/ajax/ajax_router/router.php";


#load routes
require APP_PATH."/routes/router.php";

 ?>
