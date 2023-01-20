<?php

session_start();

if (isset($_SESSION['userID'])) {
    
    if ($_SESSION['timestamp'] + 1800 < time()) {

        session_unset();
        session_destroy();
        echo '{
            "status": "logged out"
        }';

    } else {

        $_SESSION['timestamp'] = time();
        echo '{
            "status": "logged in"
        }';

    }

} else {
    session_unset();
    session_destroy();
    echo '{
        "status": "not logged in"
    }';
}

