<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'>Billing Information - Step 1 of 2</h2>
<?php echo form_open(base_url('business/order/cart/checkout'), array('class' => '', 'id' => 'business_order_checkout1')); ?>
<div class='well'>
<label>Card Type:</label>
<select name="card_type">
<option value="American Express">American Express</option>
<option value="Discover">Discover</option>
<option value="MasterCard">MasterCard</option>
<option value="VISA">VISA</option>
</select>&nbsp;<?php echo form_error('card_type'); ?><br />
<label>Cardholder Name:</label>
<input type="text" name="card_holder" class="text">&nbsp;<?php echo form_error('card_holder'); ?><br />
<label>Card Number:</label>
<input type="text" name="card_number" class="text">&nbsp;<?php echo form_error('card_number'); ?><br/>
<label>CVV:</label>
<input type="text" name="cvv" class="text">&nbsp;<?php echo form_error('cvv'); ?><br/>
<label>Exp Month:</label>
<select name="cc_exp_month">															         <option selected="" value="01">01-January</option>
    <option value="01">01-January</option>
    <option value="02">02-February</option>
    <option value="03">03-March</option>
    <option value="04">04-April</option>
    <option value="05">05-May</option>
    <option value="06">06-June</option>
    <option value="07">07-July</option>
    <option value="08">08-August</option>
    <option value="09">09-September</option>
    <option value="10">10-October</option>
    <option value="11">11-November</option>
    <option value="12">12-December</option>
</select><br/>
<label>Exp Year:</label>
<select name="cc_exp_year">
    <option selected="" value="15">2015</option>
    <option value="2013">2013</option>
    <option value="2014">2014</option>
    <option value="2015">2015</option>
    <option value="2016">2016</option>
    <option value="2017">2017</option>
    <option value="2018">2018</option>
    <option value="2019">2019</option>
    <option value="2020">2020</option>
    <option value="2021">2021</option>
    <option value="2022">2022</option>
    <option value="2023">2023</option>
    <option value="2024">2024</option>
    <option value="2025">2025</option>
    <option value="2026">2026</option>
    <option value="2027">2027</option>
    <option value="2028">2028</option>
    <option value="2029">2029</option>
    <option value="2030">2030</option>
    <option value="2031">2031</option>
</select><br/>
<label>Store Credit Card:</label><input type="radio" class="normal" value="yes" name="store">Yes<input type="radio" checked="" class="normal" value="no" name="store">No<br/>
</div>
<h2 class='well'>Promo Code</h2>
<div class='well'>
<label>Promo Code:</label>
<input type="text" value="" name="promo" class="text"><br/>
</div>
<h2 class='well'>Legal Agreement</h2>
<p>
<textarea readonly="" cols="100" rows="8" name="terms">Disclaimer to Employer
l . Purpose of Request

(A) By registering with instant-mvr.com to receive reports of driver's records from any state in the United States except Georgia or Washington, you certify that you are an employer or prospective employer of each driver whose information you request and that instant-mvr.com is acting as your agent for each request. You certify that the purpose of your request(s) is for one or more of the following uses:
    i) Continuing employment of the driver(s), specifically relating to operation of a motor vehicle
    ii) Potential employment of the driver(s), specifically relating to operation of a motor vehicle
    iii) Underwriting insurance regarding the driver(s)
	iv) Determining driver's eligibility for a commercial driver's license under the Commercial Motor Vehicle Safety Act of 1986

	You further certify that no information in any such report shall be divulged, sold, assigned, or otherwise transferred to any third person or party. You understand that any other use of the information we provide to you, except for the purposes listed above, may subject you to civil penalties under federal and state law.

(B) By registering with instant-mvr.com to receive reports of driver's records from the state of Georgia, you certify that you are an employer or prospective employer of each driver whose information you request and that instant-mvr.com is acting as your agent for each such request. You further certify that the purpose of your request(s) is specifically for underwriting insurance regarding the driver(s) whose information you are requesting, and that no information in any such report shall be divulged, sold, assigned, or otherwise transferred to any third person or party. You understand that any other use of the information we provide to you, except for the purpose stated above, may subject you to civil penalties under federal and state law.


(C) By registering with instant-mvr.com to receive reports of driver's records from the state of Washington, you certify that you are an employer or prospective employer of each driver whose information you request and that instant-mvr.com is acting as your agent for the purpose of each such request. You further certify that the report(s) provided to you by instant-mvr.com shall be used exclusively to determine whether the named driver(s) should be employed or permitted to operate a commercial vehicle or school bus upon the public highways of the State of Washington, and that no information in any such report shall be divulged, sold, assigned, or otherwise transferred to any third person or party.

"Commercial vehicle" means any vehicle the principal use of which is the transportation of commodities, merchandise, produce, freight, animals, or passengers for hire. you further certify that the information contained in the report(s) shall be used in accordance with the requirements of and shall in no way violate the provisions of RCW 46.52.130. You understand that any use of the information we provide to you, except for the purpose stated above, may subject you to civil penalties under federal and state law. 

2. Written Permission

(A) By registering with instant-mvr.com, you certify that you have notified each driver in writing that you will be requesting their driver's record report, and that such report will be updated on a regular basis. You also certify that each driver whose information you request has already provided you with his or her written permission to request the information and the updated information, in a format that conforms or substantially conforms to the form provided on this website.

3. Forward Written Permission

	By registering with instant-mvr.com, you certify that you will forward a copy of each driver's written authorization to instant-mvr.com within 3 business days of making the first request regarding that driver by sending a fax of the original document, including the driver's signature to 1-800-223-1014. You certify that the original document will be kept on file by you for a minimum of 5 years, and that the original document will be made available for inspection to instant-mvr.com at our request. You understand that failure to comply with this provision will constitute a material breach of this agreement, and will result in instant-mvr.com denying all record requests by you in the future, as well as any updated reports you may have requested. 


4. Request Refusal
	
	instant-mvr.com reserves the right to refuse requests for drivers' records at any time and for any reason, including, but not limited to, refusal of requests that provide us with incomplete or inaccurate information, refusal for your violation of any applicable state or federal law or regulation, and refusal for your failure to comply with the terms and conditions you agree to on this website, including, but not limited to your failure to submit a copy of the driver's written permission to instant-mvr.com within the prescribed time period, or your failure to submit a copy of the driver's written permission that specifically grants you permission to receive regular, updated reports. 

5. Information Source and Accuracy

	The ultimate sources of the information provided on this website are various state agencies and service bureaus. Although every effort is made to ensure the accuracy of transmission and data, the reports are provided "as is." instant-mvr.com in no way warrants or assumes any liability for the accuracy and/or completeness of any information report provided on this website. instant-mvr.com assumes no responsibility for charges incurred, lost revenue, nor actual, compensatory, incidental, special or consequential damages of any kind in connection with the information supplied rough this website. Without limitation of the foregoing, instant-mvr.com is not responsible for actual, compensatory, incidental, special or consequential damages of any kind due to errors in customer input, duplicate requests, errors in transmission, program or equipment failures, communication problems, process delays, or schedule changes. Without limitation of the foregoing disclaimer, in no event shall instant-mvr.com's liability exceed the charges actually billed to you by instant-mvr.com. 


6. Report Date
 When appropriate and where permitted, motor vehicle reports may be supplied from the archive database or history files of other service bureaus. These archive reports may not contain the same data as a current state report. The report will be noted as an archive report and will show the original report date. 
            
7. Adverse Action
              
	(A) By registering with instant-mvr.com, you certify that if, based in whole or in part on a report we provide, you decide to take any adverse action against a driver, including, but not limited to, denying employment, you will provide the driver with a copy of the report and a description in writing of the driver's rights under the Fair Credit Reporting Act as prescribed by the Federal Trade Commission. (The description of the driver's rights is available for  download on this website.) 


8. Compliance with Law
	
	By registering with instant-mvr.com, you certify that you are in compliance with, and        will continue to comply with, the Fair Credit Reporting Act and the Driver's Privacy    Protection Act of 1994, and that you will not misuse any information we provide to you in violation of federal or state equal employment opportunity laws or regulations. You further certify that the reports we provide to you are for the sole and internal use of your company, and will not be resold, sub-licensed or otherwise revised in any way or delivered to any third party. 

9. Indemnification
	
	By registering with instant-mvr.com, you agree that you will indemnify and hold harmless instant-mvr.com, its affiliated companies and their officers, directors, employees and shareholders from any and all damages as well as any and all fines, penalties or any other liabilities imposed by local, state or federal laws or regulations or claimed by any third party, including attorneys fees, which result from or arise out further publication or unauthorized use of the information reports and related services which are provided through this website.
</textarea>

<br><br>
</p>
<table width="90%">
<tbody><tr>
   <td>
       <?php echo form_error('agreement'); ?><br/>
      <input type="checkbox" value="I agree to the terms as stated in the agreement" name="agreement" >By submitting an information request to instant-mvr.com, you certify, under penalty of perjury, that all information provided by you in this request shall be true and accurate to the best of your knowledge and ability.
   </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
   <td>
      By submitting this request, you certify that you have read, understood and agree to the above legally binding agreement.
   </td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr>
   <td>
      PLEASE VERIFY ALL OF THE INFORMATION PROVIDED ABOVE, ESPECIALLY THE DRIVER LICENSE NUMBER. FAILURE TO PROVIDE A CORRECT DRIVERS LICENSE NUMBER WILL RESULT IN AN UNSUCCESSFUL SEARCH FOR YOUR DRIVING RECORD,  AND YOUR CREDIT CARD WILL STILL BE CHARGED.  ALL ORDERS ARE DISPATCHED TO THEIR RESPECTIVE STATE DMV RESEARCHERS IMMEDIATELY.  NO CANCELLATIONS OR CHANGES CAN BE MADE AFTER YOU SUBMIT YOUR ORDER. 
   </td>
</tr>
</tbody></table>
<hr/>
<?php echo form_submit('continue1','Agree & Review Order'); ?><button onclick="window.location='<?php echo base_url('business/cart'); ?>';return false;">Cancel</button>
<?php echo form_close(); ?>