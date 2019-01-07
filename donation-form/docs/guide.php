<?PHP 
ob_start();
session_start();
include"../php/include/common.php";
include"../php/include/init.php";
                   
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>PHP Donation Form | Installation Guide</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" media="screen" href="../assets/style.css" /> 
<link type="text/css" rel="stylesheet" media="all" href="../assets/highlight.css" />

<script type="text/javascript" src="../assets/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../assets/scripts/common/jquery.scrollTo-min.js"></script>
<script type="text/javascript" src="../assets/jquery.min.js"></script>
<script type="text/javascript" src="../assets/highlight.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
            $('pre.code').highlight({source:1, zebra:1, indent:'space', list:'ol'});
    });
</script>
</head>

<body>
    	<div class="wrapper">         
            <h1 style="text-align: center;">PHP Donation Form - Installation Guide</h1> 
            <div class="docs">
                    <h2>Step1 - Edit Config File</h2>
                    <h3>General Config</h3>
                    <p>Open: php\include\config\config.php</p>
                    <pre class="code" lang="php">array(
    "site_url"=> "http://www.yourdomain.com/donation-form/",  //  Trailing slash must be there
    "demo_mode"=> true, // email will be disabled
    "currency"=> 'USD', 
    "database"  => array(
        'host'=>'localhost', // Your DB Host
        'user'=>'root', // DB User
        'password'=>'root', // DB Password
        'db'=>'donation_form' // Database
    )
);</pre>
                    
                    <h3>Payment Config</h3>
                    <p>Open: php\include\config\config.php</p>
                    <pre class="code" lang="php">array(
    'paypal' => array
    (
         //PayPal Business Email
        'merchant_email' => '1327561752_biz@gmail.com',
        
        // PDT Token from PayPal - Check PayPal Website Preference Settings
        'pdt_auth_code' => 'XXzsgLIK23zrz_FEDP2sYYXXjd9xi4YiXSTz9IFloD9uGOE2Q3jlhdyJkvq' 
    ) 
);</pre>
                    
            <h2 style="margin-top: 10px;">Step2 - Database</h2>
            <h3>Create Database</h3>
            <p>You can use MySQL Manager e.g. PHPMyAdmin</p>
            
             <h3>Import Database</h3>
             <p>SQL File: docs\database\donation_form.sql</p>
             
             <h2 style="margin-top: 10px;">Step3 - Test - Thats it!</h2>
              <h3>Donation Form</h3>
                 <p><a href="<?PHP echo DonationConfig::get("site_url"); ?>"><?PHP echo DonationConfig::get("site_url"); ?></a></p><br />
              <h3>Admin Details</h3>
               <p><a href="<?PHP echo DonationConfig::get("site_url"); ?>admin.php"><?PHP echo DonationConfig::get("site_url"); ?>admin.php</a></p><br />
               <p>u: admin</p>
               <p>p: admin</p>
                    
        </div>


        </div>
</body>
</html>