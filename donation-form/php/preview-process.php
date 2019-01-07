<?PHP
/**
 * Form Handler
 *
 * @author      Muneeb <m4munib@hotmail.com>
 * @copyright   Muneeb <m4munib@hotmail.com>
 * @twitter     http://twitter.com/#!/muhammadmunib
 */
require_once"include/init.php";  
$handler = new clsPreviewFormHandler($config,$_POST);
$handler->handle();
?>