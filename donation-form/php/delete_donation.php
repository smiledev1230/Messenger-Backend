<?PHP
/**
 * Delete Donation
 *
 * @author      Muneeb <m4munib@hotmail.com>
 * @copyright   Muneeb <m4munib@hotmail.com>
 * @twitter     http://twitter.com/#!/muhammadmunib
 */

require_once "include/init.php";

if(CommonFunc::isGet() && isset($_GET['id']))
{
    $contact = new modDonations(MySql::Instance()) ;
    if($contact->Delete($_GET['id']))
    {
        $_SESSION['contact-request-flash'] = "".CommonFunc::SUCCESS."|Entry deleted successfully.";
    }
    else
    {
         $_SESSION['contact-request-flash'] = "".CommonFunc::ERROR."|Entry couldn't be deleted";
    }
    
    CommonFunc::redirect("donations.php");
    
}else
{
    echo"Invalid request!";
}
?>