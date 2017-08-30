<?php
// router.php
if (preg_match('/\.(?:css|js|png|jpg|jpeg|gif|svg|woff2|woff|ttf|map|php)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else {
    require('app.php');
}
