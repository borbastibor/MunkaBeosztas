<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>

        <?php 
        require_once("application/view/navPartialView.php");
        $application->loadController($array_uri['controller']); 
        ?>
    </body>
</html>
