<?PHP
/**
 * Form Handler
 *
 * @author      Muneeb <m4munib@hotmail.com>
 * @copyright   Muneeb <m4munib@hotmail.com>
 * @twitter     http://twitter.com/#!/muhammadmunib
 */
require_once"include/init.php";  

$cmd = new clsPayPalDonationHandler();
$data = array();
$data['item_name'] = Settings::Get('donation_statement_title');
$data['currency_code'] = DonationConfig::Get('currency');

$cmd->setData($data)->donate();
?>