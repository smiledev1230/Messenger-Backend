<?php
error_reporting(0);

$allinone=unserialize(base64_decode(@$_POST['allinone']));
//   print_r($allinone);
$resultpostdatain2=unserialize(base64_decode(@$allinone['resultpostin']));
$resultpostdataout2=unserialize(base64_decode(@$allinone['resultpostout']));
$userpostdata1=unserialize(base64_decode($allinone['userpostdata']));
$userpostdata=unserialize(base64_decode($userpostdata1['userpostdata']));
$resultpostdatain=unserialize(base64_decode($userpostdata1['resultpostin']));
$resultpostdataout=unserialize(base64_decode($userpostdata1['resultpostout']));
$SegmentType = $userpostdata['SegmentType']; 
 $TripType = $userpostdata['TripType']; 
$Origin = $userpostdata['Origin'];
$Destination = $userpostdata['Destination'];
$Date = $userpostdata['Date'];
$ReturnDate = $userpostdata['ReturnDate'];
$Adults = $userpostdata['Adults'];
$Childs = $userpostdata['Childs'];
$Infants = $userpostdata['Infants'];
$AirlineId = $userpostdata['AirlineId'];
$ClassType = $userpostdata['ClassType'];
$tamount=0;
if($allinone['grossamountin']){
	$tamount=$tamount+$allinone['grossamountin'];
}
if($allinone['grossamountout']){
	$tamount=$tamount+$allinone['grossamountout'];
}

if($TripType=='R'){	
	
$test='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:api="http://apiapps.riyawings.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <api:BookReservation>
       <!--Optional:-->
         <api:objSecurity>
            <!--Optional:-->
           <api:WebTerminal>RADEL030001401</api:WebTerminal>
            <!--Optional:-->
            <api:WebUserName>Ezee01</api:WebUserName>
            <!--Optional:-->
            <api:WebPassword>u2pws01</api:WebPassword>
            <!--Optional:-->
            <api:WebIp>103.195.185.75</api:WebIp>
            <!--Optional:-->
            <api:WebAppType>API</api:WebAppType>
         </api:objSecurity>
         <!--Optional:-->
         <api:strBookRequest>
         <![CDATA[<BookReservation>
<SellReferenceId>'.$allinone['trackid'].'</SellReferenceId>
<CustomerDetails>
<Title>'.$allinone['gender'].'</Title>
<Firstname>'.$allinone['fname'].'</Firstname>
<Lastname>'.$allinone['lname'].'</Lastname>
<Address1>'.$allinone['address'].'</Address1>
<Address2></Address2>
<Address3></Address3>
<City>'.$allinone['City'].'</City>
<State>'.$allinone['State'].'</State>
<Country>'.$allinone['Country'].'</Country>
<MailId>'.$allinone['MailId'].'</MailId>
<PinCode>'.$allinone['Pincode'].'</PinCode>
<ContactNo>'.$allinone['ContactNo'].'</ContactNo>
</CustomerDetails>
<NoofAdults>'.$Adults.'</NoofAdults>
<NoofChild>'.$Childs.'</NoofChild>
<NoofInfants>'.$Infants.'</NoofInfants>
<TripType>'.$TripType.'</TripType>
<SegmentType>'.$SegmentType.'</SegmentType>
<TotalAmount>'.$tamount.'</TotalAmount>
<PaymentMode>AT</PaymentMode>
<GSTDetail>
<GSTNumber >27AAAAA0000A1Z1</GSTNumber>
<GSTCompanyName >TESTAGENCY</GSTCompanyName >
<GSTAddress >CHENNAI</GSTAddress >
<GSTEmailID >test@gmail.com</GSTEmailID >
<GSTMobileNumber >9638527410</GSTMobileNumber >
</GSTDetail>
<Bookingdetails>';

$test=$test.'<Item>
<ValidatingCarrier>6E</ValidatingCarrier>
<Payment>
<item>
<CurrencyCode>INR</CurrencyCode>
<Amount>'.$tamount.'</Amount>
</item>
</Payment>
<TourCode></TourCode>
<Passengerlist>';

$ad=0;
$ch=0;
$in=0;

while($ad<count($allinone['genderadults'])){
$test=$test.'
<item>
<PaxType>ADT</PaxType>
<Title>'.$allinone['genderadults'][$ad].'</Title>
<FirstName>'.$allinone['fnameadults'][$ad].'</FirstName>
<LastName>'.$allinone['lnameadulats'][$ad].'</LastName>
<DateofBirth>'.$allinone['dobadults'][$ad].'</DateofBirth>
<Gender>M</Gender>
<SpecialReqcode></SpecialReqcode>
<Mealcode>'.$allinone['mealadults'][$ad].'</Mealcode>
<PassportInfo>
<IdentityProofId>Passport</IdentityProofId>
<IdentityProofNumber>ASD11313</IdentityProofNumber>
<CountryId>IND</CountryId>
<ExpiryDate>12/03/2021</ExpiryDate>
</PassportInfo><Segment>';
$tcount=count($resultpostdatain);
$k=0;
while($k<$tcount){
$test=$test.'<item>
<FlightID>'.$resultpostdatain[$k]['FlightID'].'</FlightID>
<CarrierId>'.$resultpostdatain[$k]['CarrierCode'].'</CarrierId>
<Origin>'.$resultpostdatain[$k]['Origin'].'</Origin>
<Destination>'.$resultpostdatain[$k]['Destination'].'</Destination>
<DepartureDateTime>'.$resultpostdatain[$k]['DepartureDateTime'].'</DepartureDateTime>
<ArrivalDateTime>'.$resultpostdatain[$k]['ArrivalDateTime'].'</ArrivalDateTime>
<ClassCode>'.$resultpostdatain[$k]['ClassCode'].'</ClassCode>
<FrequentFlyerNumber></FrequentFlyerNumber>
</item>';
$k++;
}

$test=$test.'</Segment></item>';

$ad++;
}
$test=$test.'</Passengerlist></Item>';


$test=$test.'<Item>
<ValidatingCarrier>6E</ValidatingCarrier>
<Payment>
<item>
<CurrencyCode>INR</CurrencyCode>
<Amount>'.$allinone['grossamountout'].'</Amount>
</item>
</Payment>
<TourCode></TourCode>
<Passengerlist>';

$ad=0;
$ch=0;
$in=0;

while($ad<count($allinone['genderadults'])){
$test=$test.'
<item>
<PaxType>ADT</PaxType>
<Title>'.$allinone['genderadults'][$ad].'</Title>
<FirstName>'.$allinone['fnameadults'][$ad].'</FirstName>
<LastName>'.$allinone['lnameadulats'][$ad].'</LastName>
<DateofBirth>'.$allinone['dobadults'][$ad].'</DateofBirth>
<Gender>M</Gender>
<SpecialReqcode></SpecialReqcode>
<Mealcode>'.$allinone['mealadults'][$ad].'</Mealcode>
<PassportInfo>
<IdentityProofId>Passport</IdentityProofId>
<IdentityProofNumber>ASD11313</IdentityProofNumber>
<CountryId>IND</CountryId>
<ExpiryDate>12/03/2021</ExpiryDate>
</PassportInfo><Segment>';
$tcount=count($resultpostdataout);
$k=0;
while($k<$tcount){
$test=$test.'<item>
<FlightID>'.$resultpostdataout[$k]['FlightID'].'</FlightID>
<CarrierId>'.$resultpostdataout[$k]['CarrierCode'].'</CarrierId>
<Origin>'.$resultpostdataout[$k]['Origin'].'</Origin>
<Destination>'.$resultpostdataout[$k]['Destination'].'</Destination>
<DepartureDateTime>'.$resultpostdataout[$k]['DepartureDateTime'].'</DepartureDateTime>
<ArrivalDateTime>'.$resultpostdataout[$k]['ArrivalDateTime'].'</ArrivalDateTime>
<ClassCode>'.$resultpostdataout[$k]['ClassCode'].'</ClassCode>
<FrequentFlyerNumber></FrequentFlyerNumber>
</item>';
$k++;
}

$test=$test.'</Segment></item>';

$ad++;
}

while($ch<count($allinone['genderchilds'])){
$test=$test.'
<item>
<PaxType>CHD</PaxType>
<Title>'.$allinone['genderchilds'][$ch].'</Title>
<FirstName>'.$allinone['fnamechilds'][$ch].'</FirstName>
<LastName>'.$allinone['lnamechilds'][$ch].'</LastName>
<DateofBirth>'.$allinone['dobchilds'][$ch].'</DateofBirth>
<Gender>M</Gender>
<SpecialReqcode></SpecialReqcode>
<Mealcode>'.$allinone['mealchilds'][$ch].'</Mealcode>
<PassportInfo>
<IdentityProofId>Passport</IdentityProofId>
<IdentityProofNumber>ASD11313</IdentityProofNumber>
<CountryId>IND</CountryId>
<ExpiryDate>12/03/2021</ExpiryDate>
</PassportInfo><Segment>';
$tcount=count($resultpostdatain);
$k=0;
while($k<$tcount){
$test=$test.'<item>
<FlightID>'.$resultpostdatain[$k]['FlightID'].'</FlightID>
<CarrierId>'.$resultpostdatain[$k]['CarrierCode'].'</CarrierId>
<Origin>'.$resultpostdatain[$k]['Origin'].'</Origin>
<Destination>'.$resultpostdatain[$k]['Destination'].'</Destination>
<DepartureDateTime>'.$resultpostdatain[$k]['DepartureDateTime'].'</DepartureDateTime>
<ArrivalDateTime>'.$resultpostdatain[$k]['ArrivalDateTime'].'</ArrivalDateTime>
<ClassCode>'.$resultpostdatain[$k]['ClassCode'].'</ClassCode>
<FrequentFlyerNumber></FrequentFlyerNumber>
</item>';
$k++;
}

$test=$test.'</Segment></item>';
$ch++;
}

while($in<count($allinone['genderinfants'])){
$test=$test.'
<item>
<PaxType>INF</PaxType>
<Title>'.$allinone['genderinfants'][$in].'</Title>
<FirstName>'.$allinone['fnameinfants'][$in].'</FirstName>
<LastName>'.$allinone['lnameinfants'][$in].'</LastName>
<DateofBirth>'.$allinone['dobinfants'][$in].'</DateofBirth>
<Gender>M</Gender>
<SpecialReqcode></SpecialReqcode>
<Mealcode>'.$allinone['mealinfants'][$in].'</Mealcode>
<PassportInfo>
<IdentityProofId>Passport</IdentityProofId>
<IdentityProofNumber>ASD11313</IdentityProofNumber>
<CountryId>IND</CountryId>
<ExpiryDate>12/03/2021</ExpiryDate>
</PassportInfo><Segment>';
$tcount=count($resultpostdatain);
$k=0;
while($k<$tcount){
$test=$test.'<item>
<FlightID>'.$resultpostdatain[$k]['FlightID'].'</FlightID>
<CarrierId>'.$resultpostdatain[$k]['CarrierCode'].'</CarrierId>
<Origin>'.$resultpostdatain[$k]['Origin'].'</Origin>
<Destination>'.$resultpostdatain[$k]['Destination'].'</Destination>
<DepartureDateTime>'.$resultpostdatain[$k]['DepartureDateTime'].'</DepartureDateTime>
<ArrivalDateTime>'.$resultpostdatain[$k]['ArrivalDateTime'].'</ArrivalDateTime>
<ClassCode>'.$resultpostdatain[$k]['ClassCode'].'</ClassCode>
<FrequentFlyerNumber></FrequentFlyerNumber>
</item>';
$k++;
}

$test=$test.'</Segment></item>';
$in++;
}

$test=$test.'</Passengerlist></Item>';





$test=$test.'</Bookingdetails>
</BookReservation>]]>         
         </api:strBookRequest>
      </api:BookReservation>
   </soapenv:Body>
</soapenv:Envelope>'; 
 


	
}else{
		$test='<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:api="http://apiapps.riyawings.com/">
   <soapenv:Header/>
   <soapenv:Body>
      <api:BookReservation>
         <!--Optional:-->
         <api:objSecurity>
            <!--Optional:-->
           <api:WebTerminal>RADEL030001401</api:WebTerminal>
            <!--Optional:-->
            <api:WebUserName>Ezee01</api:WebUserName>
            <!--Optional:-->
            <api:WebPassword>u2pws01</api:WebPassword>
            <!--Optional:-->
            <api:WebIp>103.195.185.75</api:WebIp>
            <!--Optional:-->
            <api:WebAppType>API</api:WebAppType>
         </api:objSecurity>
         <!--Optional:-->
         <api:strBookRequest>
         <![CDATA[<BookReservation>
<SellReferenceId>'.$allinone['trackid'].'</SellReferenceId>
<CustomerDetails>
<Title>'.$allinone['gender'].'</Title>
<Firstname>'.$allinone['fname'].'</Firstname>
<Lastname>'.$allinone['lname'].'</Lastname>
<Address1>'.$allinone['address'].'</Address1>
<Address2></Address2>
<Address3></Address3>
<City>'.$allinone['City'].'</City>
<State>'.$allinone['State'].'</State>
<Country>'.$allinone['Country'].'</Country>
<MailId>'.$allinone['MailId'].'</MailId>
<PinCode>'.$allinone['Pincode'].'</PinCode>
<ContactNo>'.$allinone['ContactNo'].'</ContactNo>
</CustomerDetails>
<NoofAdults>'.$Adults.'</NoofAdults>
<NoofChild>'.$Childs.'</NoofChild>
<NoofInfants>'.$Infants.'</NoofInfants>
<TripType>'.$TripType.'</TripType>
<SegmentType>'.$SegmentType.'</SegmentType>
<TotalAmount>'.$allinone['grossamountin'].'</TotalAmount>
<PaymentMode>AT</PaymentMode>
<GSTDetail>
<GSTNumber >27AAAAA0000A1Z1</GSTNumber>
<GSTCompanyName >TESTAGENCY</GSTCompanyName >
<GSTAddress >CHENNAI</GSTAddress >
<GSTEmailID >test@gmail.com</GSTEmailID >
<GSTMobileNumber >9638527410</GSTMobileNumber >
</GSTDetail>
<Bookingdetails>
<Item>
<ValidatingCarrier>6E</ValidatingCarrier>
<Payment>
<item>
<CurrencyCode>INR</CurrencyCode>
<Amount>'.$allinone['grossamountin'].'</Amount>
</item>
</Payment>
<TourCode></TourCode>
<Passengerlist>';

$ad=0;
$ch=0;
$in=0;
;
while($ad<count($allinone['genderadults'])){
$test=$test.'
<item>
<PaxType>ADT</PaxType>
<Title>'.$allinone['genderadults'][$ad].'</Title>
<FirstName>'.$allinone['fnameadults'][$ad].'</FirstName>
<LastName>'.$allinone['lnameadulats'][$ad].'</LastName>
<DateofBirth>'.$allinone['dobadults'][$ad].'</DateofBirth>
<Gender>M</Gender>
<SpecialReqcode></SpecialReqcode>
<Mealcode>'.$allinone['mealadults'][$ad].'</Mealcode>
<PassportInfo>
<IdentityProofId>Passport</IdentityProofId>
<IdentityProofNumber>ASD11313</IdentityProofNumber>
<CountryId>IND</CountryId>
<ExpiryDate>12/03/2021</ExpiryDate>
</PassportInfo><Segment>';
$tcount=count($resultpostdatain);
$k=0;
while($k<$tcount){
$test=$test.'<item>
<FlightID>'.$resultpostdatain[$k]['FlightID'].'</FlightID>
<CarrierId>'.$resultpostdatain[$k]['CarrierCode'].'</CarrierId>
<Origin>'.$resultpostdatain[$k]['Origin'].'</Origin>
<Destination>'.$resultpostdatain[$k]['Destination'].'</Destination>
<DepartureDateTime>'.$resultpostdatain[$k]['DepartureDateTime'].'</DepartureDateTime>
<ArrivalDateTime>'.$resultpostdatain[$k]['ArrivalDateTime'].'</ArrivalDateTime>
<ClassCode>'.$resultpostdatain[$k]['ClassCode'].'</ClassCode>
<FrequentFlyerNumber></FrequentFlyerNumber>
</item>';
$k++;
}

$test=$test.'</Segment></item>';
$ad++;
}

while($ch<count($allinone['genderchilds'])){
$test=$test.'
<item>
<PaxType>CHD</PaxType>
<Title>'.$allinone['genderchilds'][$ch].'</Title>
<FirstName>'.$allinone['fnamechilds'][$ch].'</FirstName>
<LastName>'.$allinone['lnamechilds'][$ch].'</LastName>
<DateofBirth>'.$allinone['dobchilds'][$ch].'</DateofBirth>
<Gender>M</Gender>
<SpecialReqcode></SpecialReqcode>
<Mealcode>'.$allinone['mealchilds'][$ch].'</Mealcode>
<PassportInfo>
<IdentityProofId>Passport</IdentityProofId>
<IdentityProofNumber>ASD11313</IdentityProofNumber>
<CountryId>IND</CountryId>
<ExpiryDate>12/03/2021</ExpiryDate>
</PassportInfo><Segment>';
$tcount=count($resultpostdatain);
$k=0;
while($k<$tcount){
$test=$test.'<item>
<FlightID>'.$resultpostdatain[$k]['FlightID'].'</FlightID>
<CarrierId>'.$resultpostdatain[$k]['CarrierCode'].'</CarrierId>
<Origin>'.$resultpostdatain[$k]['Origin'].'</Origin>
<Destination>'.$resultpostdatain[$k]['Destination'].'</Destination>
<DepartureDateTime>'.$resultpostdatain[$k]['DepartureDateTime'].'</DepartureDateTime>
<ArrivalDateTime>'.$resultpostdatain[$k]['ArrivalDateTime'].'</ArrivalDateTime>
<ClassCode>'.$resultpostdatain[$k]['ClassCode'].'</ClassCode>
<FrequentFlyerNumber></FrequentFlyerNumber>
</item>';
$k++;
}

$test=$test.'</Segment></item>';
$ch++;
}
while($in<count($allinone['genderinfants'])){
$test=$test.'
<item>
<PaxType>INF</PaxType>
<Title>'.$allinone['genderinfants'][$in].'</Title>
<FirstName>'.$allinone['fnameinfants'][$in].'</FirstName>
<LastName>'.$allinone['lnameinfants'][$in].'</LastName>
<DateofBirth>'.$allinone['dobinfants'][$in].'</DateofBirth>
<Gender>M</Gender>
<SpecialReqcode></SpecialReqcode>
<Mealcode>'.$allinone['mealinfants'][$in].'</Mealcode>
<PassportInfo>
<IdentityProofId>Passport</IdentityProofId>
<IdentityProofNumber>ASD11313</IdentityProofNumber>
<CountryId>IND</CountryId>
<ExpiryDate>12/03/2021</ExpiryDate>
</PassportInfo><Segment>';
$tcount=count($resultpostdatain);
$k=0;
while($k<$tcount){
$test=$test.'<item>
<FlightID>'.$resultpostdatain[$k]['FlightID'].'</FlightID>
<CarrierId>'.$resultpostdatain[$k]['CarrierCode'].'</CarrierId>
<Origin>'.$resultpostdatain[$k]['Origin'].'</Origin>
<Destination>'.$resultpostdatain[$k]['Destination'].'</Destination>
<DepartureDateTime>'.$resultpostdatain[$k]['DepartureDateTime'].'</DepartureDateTime>
<ArrivalDateTime>'.$resultpostdatain[$k]['ArrivalDateTime'].'</ArrivalDateTime>
<ClassCode>'.$resultpostdatain[$k]['ClassCode'].'</ClassCode>
<FrequentFlyerNumber></FrequentFlyerNumber>
</item>';
$k++;
}

$test=$test.'</Segment></item>';
$in++;
}
$test=$test.'</Passengerlist>
</Item>
</Bookingdetails>
</BookReservation>]]>         
         </api:strBookRequest>
      </api:BookReservation>
   </soapenv:Body>
</soapenv:Envelope>'; 
 


	
}
			
echo $test; 
			
		
	

		//Change this variables.
	$location_URL = 'http://testapi.travarena.com/travarenaws/rws.asmx?wsdl';
	$action_URL = "http://apiapps.riyawings.com/BookReservation";
 
		$client = new SoapClient(null, array(
		'location' => $location_URL,
		'uri'      => "",
		'trace'    => 1,
		));
		 
		try{
			
			$xmldata = $client->__doRequest($test,$location_URL,$action_URL,1);
			$xml = simplexml_load_string($xmldata);
			
$xml->registerXPathNamespace('stest', 'http://apiapps.riyawings.com/');
			//$xmldata->registerXPathNamespace('FlightAvailabilityResponse', 'http://apiapps.riyawings.com/');
		$xml_resp = $xml->xpath('/soap:Envelope/soap:Body/stest:BookReservationResponse/stest:BookReservationResult');	

$flightarr=array();
			foreach($xml_resp as $xml_resp1){
				
				$xmls = new SimpleXMLElement($xml_resp1);
			foreach($xmls->ItinearyDetails as $ItinearyDetails1){
				//print_r($ItinearyDetails1);
				foreach($ItinearyDetails1->Item as $item1){
						//print_r($item1);
					 $status=(string)$item1->Resultcode;
				 $bid=(string)$item1->BookingTrackId;
				$m=0;
					
				}
				
			}
				
				
			}
		
			}catch (SoapFault $exception){
			var_dump(get_class($exception));
			var_dump($exception);
		}
		   if($status=="1"){
           	   
          echo "<h3>Thank You, " . $firstname .".Your flight booked successfully.</h3>";
          echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
		  echo "<h4>Your Booking tracking id is ".$txnid.".</h4>";
	   }else{
		   echo "An error occured.contact support for more information.";
	   }
           
		          
?>	