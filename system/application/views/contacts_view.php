<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
?>
<?php 
if($this->session->userdata('mailmessage')){
echo '<p>'. $this->session->userdata('mailmessage'). '</p>';
}
?>
<h1 class="pagetitle">Contact Us<span>Send us your inquiry</span></h1>

        <div id="contactinfo">
                <b>Phone:</b><br>
                +123-456-7890<br>
                <b>Email</b><br>
                <a>info@mysite.com</a><br>
                <b>Address</b><br>
                2601 Mission St.<br>
                San Francisco, CA 94110<br>
        </div>

        <?php echo form_open('contacts'); ?>

    <label>Complete Name<span class="required">*</span></label>
    <?php echo form_error('name'); ?>
    <input type="text" name="name" id="name" value="<?php echo set_value('name');?>">

    <label>Email Address<span class="required">*</span></label>
    <?php echo form_error('email'); ?>
    <input type="text" name="email" id="email" value="<?php echo set_value('email');?>">

    <label>Subject</label>
    <?php echo form_error('subject'); ?>
    <input type="text" name="subject" id="subject" value="<?php echo set_value('subject');?>">

                                                                <label>Message</label>
    <?php echo form_error('message'); ?>
    <textarea rows="10" name="message" id="message" value="<?php echo set_value('message');?>"></textarea>

    <?php echo form_submit( 'submit', 'Continue'); ?>

<?php echo form_close(); ?>	

<label>Map</label>
<div class="grid_8 alpha omega">

<img src="<?php echo base_url('assets/individual/img/usa.jpg');?>" usemap="#usaMap" id="usa">
    <map name="usaMap">
      <area shape="poly" coords="34,41,47,44,48,52,55,52,61,55,81,54,97,57,105,17,37,2,34,40" href="http://localhost/instantMVR/states/washington-driving-record.html" title="Washington">
      <area shape="poly" coords="37,39,31,57,20,75,21,89,85,106,92,79,90,76,100,64,95,56,64,53,55,51,47,51,46,42,36,39" href="http://localhost/instantMVR/states/oregon-driving-record.html" title="Oregon">
      <area shape="poly" coords="20,91,57,101,50,139,93,208,88,220,83,228,57,225,49,209,29,198,26,180,19,170,17,149,11,133,11,120,9,110,19,91" href="http://localhost/instantMVR/states/california-driving-record.html" title="California">
      <area shape="poly" coords="58,100,111,112,100,184,93,185,89,202,49,140" href="http://localhost/instantMVR/states/nevada-driving-record.html" title="Nevada">
      <area shape="poly" coords="103,20,110,20,112,42,122,55,117,70,123,69,125,81,130,85,145,84,140,119,84,106,93,70,101,64,95,59,104,20" href="http://localhost/instantMVR/states/idaho-driving-record.html" title="Idaho">
      <area shape="poly" coords="110,22,113,44,121,56,117,69,122,71,125,83,135,87,144,85,146,81,209,87,212,34" href="http://localhost/instantMVR/states/idaho-driving-record.html" title="Montana">
      <area shape="poly" coords="143,82,138,129,204,136,207,86" href="http://localhost/instantMVR/states/wyoming-driving-record.html" title="Wyoming">
      <area shape="poly" coords="111,111,140,118,139,129,157,132,151,183,101,174" href="http://localhost/instantMVR/states/utah-driving-record.html" title="Utah">
      <area shape="poly" coords="151,182,141,252,119,251,83,229,92,208,89,201,93,185,99,183,101,175" href="http://localhost/instantMVR/states/arizona-driving-record.html" title="Arizona">
      <area shape="poly" coords="139,253,151,254,152,249,168,250,207,252,210,187,150,182" href="http://localhost/instantMVR/states/newmexico-driving-record.html" title="New Mexico">
      <area shape="poly" coords="157,130,224,137,220,189,150,183" href="http://localhost/instantMVR/states/colorado-driving-record.html" title="Colorado">
      <area shape="poly" coords="209,195,241,195,239,220,256,227,271,231,285,228,297,232,302,232,302,253,307,263,305,279,298,284,288,294,278,298,268,307,266,316,268,331,263,331,258,329,249,326,241,310,231,293,223,283,210,279,203,288,195,283,186,278,185,268,172,256,169,253,169,250,206,252" href="http://localhost/instantMVR/states/texas-driving-record.html" title="Texas">
      <area shape="poly" coords="210,187,294,190" href="#">
      <area shape="poly" coords="209,187,293,189,297,209,296,233,284,231,274,232,239,221,239,197,211,196" href="http://localhost/instantMVR/states/oklahoma-driving-record.html" title="Oklahoma">
      <area shape="poly" coords="223,150,286,151,290,155,287,157,293,162,293,191,219,188" href="http://localhost/instantMVR/states/kansas-driving-record.html" title="Kansas">
      <area shape="poly" coords="286,152,281,141,279,129,273,118,264,115,256,113,206,112,203,136,222,137,222,150" href="http://localhost/instantMVR/states/nebraska-driving-record.html" title="Nebraska">
      <area shape="poly" coords="209,74,273,77,270,81,275,86,274,107,275,113,272,119,248,113,206,112,208,74" href="http://localhost/instantMVR/states/southdakota-driving-record.html" title="SouthDakota">
      <area shape="poly" coords="211,34,268,35,270,50,272,57,273,70,275,74,272,77,209,75" href="http://localhost/instantMVR/states/northdakota-driving-record.html" title="NorthDakota">
      <area shape="poly" coords="268,36,284,36,287,32,289,38,299,43,305,42,311,46,317,46,321,48,328,47,334,48,323,53,315,62,313,68,313,76,307,76,310,83,310,89,317,97,324,103,324,107,275,106,275,87,271,82,276,74" href="http://localhost/instantMVR/states/minnesota-driving-record.html" title="Minnesota">
      <area shape="poly" coords="273,107,274,114,273,119,278,129,280,141,320,143,323,145,328,137,326,134,331,131,335,124,331,118,326,116,324,116,323,107" href="http://localhost/instantMVR/states/iowa-driving-record.html" title="Iowa">
      <area shape="poly" coords="281,142,324,142,324,153,329,155,331,164,339,164,336,171,341,178,344,184,349,187,345,191,344,200,337,202,338,194,294,197,294,164,289,158,291,155,283,151" href="http://localhost/instantMVR/states/missouri-driving-record.html" title="Missouri">
      <area shape="poly" coords="294,196,338,193,338,201,343,201,339,209,339,213,337,214,337,221,333,224,332,231,333,237,302,239,303,233,296,233" href="http://localhost/instantMVR/states/arkansas-driving-record.html" title="Arkansas">
      <area shape="poly" coords="301,239,331,238,335,247,328,263,347,262,348,269,354,273,352,280,361,286,348,286,344,292,333,289,325,283,317,283,310,280,304,281,307,262,301,256" href="http://localhost/instantMVR/states/louisiana-driving-record.html" title="Louisiana">
      <area shape="poly" coords="337,213,360,211,361,256,363,268,352,271,348,269,348,262,328,264,330,259,335,249,334,244,329,240,332,234,331,231,334,222" href="http://localhost/instantMVR/states/mississippi-driving-record.html" title="Mississippi">
      <area shape="poly" coords="361,211,385,209,396,241,396,251,398,257,373,261,372,270,364,270,362,256" href="http://localhost/instantMVR/states/alabama-driving-record.html" title="Alabama">
      <area shape="poly" coords="372,266,378,267,386,265,392,270,398,275,410,268,417,273,426,278,427,284,427,290,430,295,435,305,445,314,454,322,461,321,460,304,455,292,449,280,445,272,438,257,430,255,430,261,399,260,397,257,378,260,372,261" href="http://localhost/instantMVR/states/florida-driving-record.html" title="Florida">
      <area shape="poly" coords="437,257,439,238,417,214,410,209,410,205,385,210,396,241,397,260,429,261" href="http://localhost/instantMVR/states/georgia-driving-record.html" title="Georgia">
      <area shape="poly" coords="409,204,431,199,436,204,448,202,460,211,457,217,454,225,448,233,440,239,414,212,408,209" href="http://localhost/instantMVR/states/southcarolina-driving-record.html" title="SouthCarolina">
      <area shape="poly" coords="399,207,404,200,414,192,423,182,437,181,481,172,480,177,485,178,484,185,480,189,482,192,481,195,475,198,469,201,467,208,459,211,449,202,443,203,437,203,430,198,420,201,408,206" href="http://localhost/instantMVR/states/northcarolina-driving-record.html" title="NorthCarolina">
      <area shape="poly" coords="344,192,359,192,359,189,423,182,400,208,382,210,359,212,340,213,338,208" href="http://localhost/instantMVR/states/tennessee-driving-record.html" title="Tennessee">
      <area shape="poly" coords="406,185,417,172,423,175,435,169,438,157,442,158,443,150,448,145,448,141,455,143,455,140,463,146,462,150,471,155,473,162,477,166,480,168,479,172,464,175,448,179,429,182" href="http://localhost/instantMVR/states/virginia-driving-record.html" title="Virginia">
      <area shape="poly" coords="347,187,350,183,354,184,356,179,361,173,369,173,376,170,381,162,389,155,395,158,404,158,410,164,418,172,409,185,363,190,357,192,346,192" href="http://localhost/instantMVR/states/kentucky-driving-record.html" title="Kentucky">
      <area shape="poly" coords="348,185,353,184,358,181,358,171,362,162,360,155,360,125,354,115,330,118,334,125,329,133,326,134,326,138,324,142,322,150,325,155,328,162,332,165,339,165,335,171,336,176,339,177,342,184" href="http://localhost/instantMVR/states/illinois-driving-record.html" title="Illinois">
      <area shape="poly" coords="355,116,354,112,353,104,358,83,351,91,353,82,349,74,334,71,327,67,321,66,323,62,313,67,313,76,307,76,308,81,308,87,323,104,324,114,330,119,344,117" href="http://localhost/instantMVR/states/wisconsin-driving-record.html" title="Wisconsin">
      <area shape="poly" coords="358,177,362,173,375,172,385,160,388,156,384,121,367,124,360,127,359,156,361,162,359,168,359,171" href="http://localhost/instantMVR/states/indiana-driving-record.html" title="Indiana">
      <area shape="poly" coords="384,123,396,121,403,124,410,122,423,114,426,139,424,146,419,149,416,156,410,162,405,158,395,159,387,155" href="http://localhost/instantMVR/states/ohio-driving-record.html" title="Ohio">
      <area shape="poly" coords="366,124,383,122,397,122,404,106,398,91,392,97,388,97,392,88,390,77,377,72,375,75,373,83,370,81,367,86,364,96,366,101,368,109,367,117" href="http://localhost/instantMVR/states/michigan-driving-record.html" title="Michigan">
      <area shape="poly" coords="353,82,356,73,364,71,372,67,376,69,379,67,387,67,379,62,374,63,374,59,369,60,362,63,360,65,354,64,349,60,344,62,349,53,343,54,337,60,330,63,328,68,337,72,347,73,350,76" href="http://localhost/instantMVR/states/michigan-driving-record.html" title="Michigan">
      <area shape="poly" coords="424,141,439,141,439,145,446,141,448,143,443,151,443,157,440,158,438,166,433,172,423,174,414,170,408,165,412,159,416,152,420,146" href="http://localhost/instantMVR/states/westvirginia-driving-record.html" title="WestVirginia">
      <area shape="poly" coords="439,141,473,133,476,148,481,148,480,152,472,151,470,155,461,151,463,145,462,144,457,143,452,139,448,142,440,145" href="http://localhost/instantMVR/states/maryland-driving-record.html" title="Maryland">
      <area shape="poly" coords="473,134,476,148,482,147,480,142" href="http://localhost/instantMVR/states/delaware-driving-record.html" title="Delaware">
      <area shape="poly" coords="477,153,481,153,478,163" href="http://localhost/instantMVR/states/virginia-driving-record.html" title="Virginia">
      <area shape="poly" coords="422,115,428,111,431,113,469,104,475,110,475,120,480,125,474,133,439,141,425,141" href="http://localhost/instantMVR/states/pennsylvania-driving-record.html" title="Pennsylvania">
      <area shape="poly" coords="474,134,483,137,483,140,485,130,488,121,483,120,486,113,476,110,475,123,478,128" href="http://localhost/instantMVR/states/newjersey-driving-record.html" title="NewJersey">
      <area shape="poly" coords="428,110,434,113,468,104,475,110,483,112,486,115,486,117,502,110,500,109,487,113,486,110,488,109,484,80,482,79,477,63,464,66,455,79,457,85,450,92,440,93,434,95,438,101,432,106" href="http://localhost/instantMVR/states/newyork-driving-record.html" title="NewYork">
      <area shape="poly" coords="486,90,492,88,493,66,495,64,494,58,478,63" href="http://localhost/instantMVR/states/vermont-driving-record.html" title="Vermont">
      <area shape="poly" coords="486,99,500,96,502,103,488,110" href="http://localhost/instantMVR/states/connecticut-driving-record.html" title="Connecticut">
      <area shape="poly" coords="500,96,506,94,508,101,502,103" href="http://localhost/instantMVR/states/rhodeisland-driving-record.html" title="RhodeIsland">
      <area shape="poly" coords="487,90,488,99,506,95,508,101,519,97,508,90,510,87,507,82,496,88" href="http://localhost/instantMVR/states/massachusetts-driving-record.html" title="Massachusetts">
      <area shape="poly" coords="495,64,495,56,497,54,507,79,507,83,498,89,493,89,493,71" href="http://localhost/instantMVR/states/newhampshire-driving-record.html" title="NewHampshire">
      <area shape="poly" coords="508,80,498,55,500,49,502,37,505,24,508,26,513,22,517,26,521,36,521,41,526,41,527,45,531,46,532,51,523,57,518,58,518,64,515,65,511,66,509,72" href="http://localhost/instantMVR/states/maine-driving-record.html" title="Maine">
      <area shape="poly" coords="158,290,177,350,187,352,197,347,210,358,225,367,219,372,215,375,197,361,191,358,175,355,161,352,150,355,152,358,145,362,144,363,142,359,137,365,135,368,141,374,137,379,124,384,111,392,102,396,89,403,79,407,89,399,105,392,114,384,120,374,120,368,115,368,111,372,106,371,105,361,100,359,97,361,86,360,93,356,94,352,92,348,97,343,105,339,112,339,109,329,107,328,101,330,94,330,90,325,94,318,99,318,106,322,114,319,110,315,106,312,102,310,99,304,97,301,101,297,105,293,107,290,113,288,121,285,127,287,135,288,147,289" href="http://localhost/instantMVR/states/alaska-driving-record.html" title="Alaska">
      <area shape="poly" coords="304,384,297,376,283,364,264,356,253,351,242,345,236,345,237,352,247,354,258,359,266,362,272,366,279,374,287,383,289,394,295,393,300,389" href="http://localhost/instantMVR/states/hawaii-driving-record.html" title="Hawaii">
    </map>
<div class="clearfix"></div>
</div>
