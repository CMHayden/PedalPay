<?php

/**
* Structure Is Standard Open Source. Structure Sourced From And Changed/Added To: https://www.simplifiedios.net/ios-registration-form-example/
*
* User: Belal
* Date Accessed: 05/01/2019
*
*/

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');

require_once $_SERVER['DOCUMENT_ROOT'].'/pedalPay/adminFunctions/dbAdminOperation.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/pedalPay/userFunctions/dbOperation.php';

$response = array ();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['lat']) && isset($_POST['long']) && isset($_POST['bid'])) {

        $db = new DbOperation();
        $dbAdmin = new dbAdminOperation();

        if ($db->userLogin($db->noHTML($_POST['email']), $db->noHTML($_POST['password']))) {

            if ($db->isAdmin($db->noHTML($_POST['email']))) {

                $response['error'] = false;
                $response['message'] = $dbAdmin->updateLocation($db->noHTML($_POST['lat']), $db->noHTML($_POST['long']), $db->noHTML($_POST['bid']));

            } else {

                $response['error'] = true;
                $response['message'] = "User Must Be Admin";

            }

        } else {

            $response['error'] = true;
            $response['message'] = "User Login Failed";

        }

    } else {

        $response['error'] = true;
        $response['message'] = "All Fields Are Required To Update Bike Location";

    }

} else {

    $response['error'] = true;
    $response['message'] = "Request Not Allowed";

}

echo json_encode($response);

?>
