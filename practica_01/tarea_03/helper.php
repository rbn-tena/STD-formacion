<?php

    function end_err($code, $message) {

        /*$response: {
            "code": $code,
            "message" : $message
        };
                //result {} no entiendo para que
        die(json_encode(response)); exit;*/

        $response[] = array("code"=>$code,"message"=>$message);
        die(json_encode($response)); exit;
    }

?>
