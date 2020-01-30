<!--breadcumb start here-->
<?php
$page_name = "anything";
$page_title = "Members Registeration";
 include "includes/header.php";
 if(isset($_POST['input_full_name'])){

   $clean = array_map('trim', $_POST);

   // $hash_id = time()."_".rand(10000,99999);
   $new['date_created'] = date("Y-m-d");
   $new['time_created'] = date("H:i:s");

   $post = $new + $clean ;
   insert($conn,"panel_members",$post);
   $done['good'] = true;

 }
 ?>
 <div class="clearfix">

 </div>
         <div class="" style="width:100%; height:20vh; background-color:#191919" data-loop="true" data-autoplay="true" data-height="100vh" data-dragable="false" data-min-height="480px">
         </div>

</header>
      <!-- Classic Breadcrumbs-->
      <style>
     * {
       box-sizing: border-box;
     }

     body {
       background-color: #f1f1f1;
     }

     #regForm {
       background-color: #ffffff;
       margin: 100px auto;
       font-family: Raleway;
       padding: 40px;
       width: 90%;
       min-width: 90%;
     }

     h1 {
       text-align: center;
     }

     input {
       padding: 10px;
       width: 100%;
       font-size: 17px;
       font-family: Raleway;
       border: 1px solid #aaaaaa;
     }

     /* Mark input boxes that gets an error on validation: */
     input.invalid {
       background-color: #ffdddd;
     }

     /* Hide all steps by default: */
     .tab {
       display: none;
     }

     button {
       background-color: #0F6A97;
       color: #ffffff;
       border: none;
       padding: 10px 20px;
       font-size: 17px;
       font-family: Raleway;
       cursor: pointer;
     }

     button:hover {
       opacity: 0.8;
     }

     #prevBtn {
       background-color: #bbbbbb;
     }

     /* Make circles that indicate the steps of the form: */
     .step {
       height: 15px;
       width: 15px;
       margin: 0 2px;
       background-color: #bbbbbb;
       border: none;
       border-radius: 50%;
       display: inline-block;
       opacity: 0.5;
     }

     .step.active {
       opacity: 1;
     }

     /* Mark the steps that are finished and valid: */
     .step.finish {
       background-color: #4CAF50;
     }
     </style>
      <section class="section section-md bg-gray-800" style="background-image: url(upload/81.jpg);">
               <div class="container" style="display:flex;justify-content: center;">
                 <?php if(!isset($done['good'])){ ?>
                 <div class="box-1 col-md-6 mx-auto card" >

                   <form id="regForm" action="" method="post">
                       <h3 style="color:#0F6A97">Hathany Cosmos Foundations Member's Registration</h3>
           <h4 style="color:#0F6A97">All Feilds are Required</h4>

           <!-- One "tab" for each step in the form: -->
           <div class="tab">

             <p><input placeholder="Full Name..." oninput="this.className = ''" name="input_full_name" value=""></p>

             <p><input placeholder="Enter School Name" oninput="this.className = ''" name="input_school_name" value=""></p>
           </div>
           <div class="tab">

             <p><input placeholder="Enter Age" oninput="this.className = ''" name="input_age" value=""></p>

             <p><input placeholder="Enter Class" oninput="this.className = ''" name="input_class" value=""></p>
             <p><input placeholder="Enter Phone Number" oninput="this.className = ''" name="input_phone_number" value=""></p>
           </div>
           <div class="tab">

<p><input placeholder="Enter Parent's Name" oninput="this.className = ''" name="input_parents_name" value=""></p>
<p><input placeholder="Enter Parent's Phone Number" oninput="this.className = ''" name="input_parents_phone_number" value=""></p>



           </div>
           <div class="tab">

             <p><input placeholder="Enter Address" oninput="this.className = ''" name="input_address" value=""></p>
             <p> <textarea class="form-control" placeholder="Reeason to become a member" name="text_reason_to_become_a_member" rows="auto" cols="auto" required></textarea>  </p>
           </div>
           <br>
           <div style="overflow:auto;">
             <div style="float:right;">
               <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
               <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
             </div>
           </div>
           <!-- Circles which indicates the steps of the form: -->
           <div style="text-align:center;margin-top:40px;">
             <span class="step"></span>
             <span class="step"></span>
             <span class="step"></span>
             <span class="step"></span>
           </div>
         </form>

         <script>
         var currentTab = 0; // Current tab is set to be the first tab (0)
         showTab(currentTab); // Display the current tab

         function showTab(n) {
           // This function will display the specified tab of the form...
           var x = document.getElementsByClassName("tab");
           x[n].style.display = "block";
           //... and fix the Previous/Next buttons:
           if (n == 0) {
             document.getElementById("prevBtn").style.display = "none";
           } else {
             document.getElementById("prevBtn").style.display = "inline";
           }
           if (n == (x.length - 1)) {
             document.getElementById("nextBtn").innerHTML = "Submit";
           } else {
             document.getElementById("nextBtn").innerHTML = "Next";
           }
           //... and run a function that will display the correct step indicator:
           fixStepIndicator(n)
         }

         function nextPrev(n) {
           // This function will figure out which tab to display
           var x = document.getElementsByClassName("tab");
           // Exit the function if any field in the current tab is invalid:
           if (n == 1 && !validateForm()) return false;
           // Hide the current tab:
           x[currentTab].style.display = "none";
           // Increase or decrease the current tab by 1:
           currentTab = currentTab + n;
           // if you have reached the end of the form...
           if (currentTab >= x.length) {
             // ... the form gets submitted:
             document.getElementById("regForm").submit();
             return false;
           }
           // Otherwise, display the correct tab:
           showTab(currentTab);
         }

         function validateForm() {
           // This function deals with validation of the form fields
           var x, y, i, valid = true;
           x = document.getElementsByClassName("tab");
           y = x[currentTab].getElementsByTagName("input");
           // A loop that checks every input field in the current tab:
           for (i = 0; i < y.length; i++) {
             // If a field is empty...
             if (y[i].value == "") {
               // add an "invalid" class to the field:
               y[i].className += " invalid";
               // and set the current valid status to false
               valid = false;
             }
           }
           // If the valid status is true, mark the step as finished and valid:
           if (valid) {
             document.getElementsByClassName("step")[currentTab].className += " finish";
           }
           return valid; // return the valid status
         }

         function fixStepIndicator(n) {
           // This function removes the "active" class of all steps...
           var i, x = document.getElementsByClassName("step");
           for (i = 0; i < x.length; i++) {
             x[i].className = x[i].className.replace(" active", "");
           }
           //... and adds the "active" class on the current step:
           x[n].className += " active";
         }


         localStorage.removeItem('elementName')
         // window.onload=function() {
         // var other = document.getElementById('other');
         // other.style.display = 'none';
         // document.form1.select1.onchange = function() {
         //     other.style.display =(this.value=='other')? '' : 'none';
         //     };
         // };
         function specify(name,element){
           if(!localStorage.getItem('elementName')){
               localStorage.setItem('elementName',name);
           };

         if(element.value == 'Employed' || element.value == 'Self-Employed/Business'){
           // element.name = "";
           // <p><input placeholder="Occupation" oninput="this.className = ''" name="occupation"></p>
           document.getElementById('hold').innerHTML = '<input name="occupation"  placeholder="Occupation" oninput="this.className = \'\'" value="" required>';
         }else{
           element.name = localStorage.getItem('elementName');
           document.getElementById('hold').innerHTML = '';
         }
         }
         </script>
                 </div>
               <?php }else{ ?>
                   <div class="box-1" style="max-width:80%">

     <form id="regForm"  method="post">
         <p style="color:green"><strong>Thank you, <?php echo ucwords($_POST['input_full_name']); ?>! Your Registration is Successful.</strong></p>
     </form>



                   </div>





               <?php } ?>
               </div>
             </section>

      <!-- Page Footer-->
      <!-- Default footer-->
    <?php include 'includes/footer.php'; ?>
    </div>
    <!-- Global RD Mailform Output -->
    <div class="snackbars" id="form-output-global"></div>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body><!-- Google Tag Manager --><noscript><iframe src="http://www.googletagmanager.com/ns.html?id=GTM-P9FT69"height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript><script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-P9FT69');</script><!-- End Google Tag Manager -->
</html>
