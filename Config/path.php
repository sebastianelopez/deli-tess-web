<?php 

define('DIR_BASE','/var/www/html/Final/uploads/');
define('URL_BASE','http://localhost/Final/uploads/');
 
define('EXT', '.'.pathinfo(__FILE__, PATHINFO_EXTENSION));
define('FCPATH', __FILE__);
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('PUBPATH',str_replace(SELF,'',FCPATH));

?>