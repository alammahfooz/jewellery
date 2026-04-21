<?php
ob_start();
// session_start();

/* Pagination */
define("PAGE_LIMIT", 50);
define("ADMIN_PAGE_LIMIT", 50);

/* Upload */
define("MAX_UPLOAD_FILE_SIZE", "100MB");

/* URLs */
define("HTTP_SERVER", "http://localhost/jewellery/");
define("MAIN_SERVER", "http://localhost/jewellery/");
define("DOMAIN_NAME", "http://localhost/jewellery/");
define("DOMAIN_TITLE", "Test Admin");

/* Paths (IMPORTANT) */
define("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT'] . "/jewellery/");
define("FS_PATH", $_SERVER['DOCUMENT_ROOT'] . "/jewellery/");

/* Email */
define("SALES_EMAIL", "");

/* Images */
define("IMAGE_PATH", HTTP_SERVER . "upload/");

/* Environment */
define("ENV", "LOCAL");
?>
