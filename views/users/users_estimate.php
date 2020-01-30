
<?php 
 ob_start();
$page_title = "We Buy";
  include "includes/header.php";

  $category = fetchCategory($conn);


  $error= [];
if(array_key_exists('submit', $_POST)){

  if(empty($_POST['name'])){
    $error['name']="Enter a Name";
  }
  if(empty($_POST['email'])){
    $error['email']="Enter an Email Adress";
  }
  if(empty($_POST['phone_number'])){
    $error['phone_number']="Enter a phone_number";
  }
  if(empty($_POST['quantity'])){
    $error['quantity']="Enter  quantity";
  }
   if(empty($_POST['Category'])){
    $error['Category']="Select a Category";
  }
  if(empty($_POST['adress'])){
    $error['adress']="Enter  Main Adress";
  }
    if(empty($_POST['order'])){
    $error['order']="Enter your Order";
  }
  if(empty($error)){

    $clean = array_map('trim', $_POST);
    var_dump($clean);
    $firstn = $fname;
    $lastn = $lname;
    $uri = explode("/", $_SERVER['REQUEST_URI']);
    $url = $uri[1];
     $to = "Admin@gmail.com";
     $subject = "Admin Web Office Content Upload";
     $txt = "Hello Admin, ($firstn $lastn)has added a content on "."$url"." page at the back office. Kindly check for and approval";
     $headers = "From: info@Admin.com" . "\r\n" .
     "CC: banjimayowa@gmail.com";
     mail($to,$subject,$txt,$headers);
      submitQuote($conn, $clean, $hash_id);
  }
}

?>

   <!--    <section class="section-elements-1 bg-white">
        <div class="shell">
          <h2>Forms</h2>
          <p class="big text-width-medium">With forms you can get almost any kind of information from your visitors, who will definitely appreciate this attractive element.</p>
        </div>
      </section>
 -->
      <section class="section-xs bg-white">
        <div class="shell">
          <div class="range range-50 range-center">
            <div class="cell-sm-6">
              <div class="form-request form-request-inset box-shadow-var-2">
                <h4>Send a Quote</h4>
                <!-- RD Mailform-->
                               <form  method="post">
                  <div class="form-wrap">
                  <label class="form-label" for="form-login-name-3">Your name</label><?php $display = displayErrors($error, 'name'); echo $display; ?>
                    <input class="form-input" id="form-login-name-3" type="text" name="name" >
                  </div>
                  <div class="form-wrap">
                    <label class="form-label" for="form-email-2">Your email</label><?php $display = displayErrors($error, 'email'); echo $display; ?>
                    <input class="form-input" id="form-email-2" type="email" name="email" >
                  </div>
                  <div class="form-wrap">
            <label class="form-label" for="form-phonenumber-2">Phone Number</label><?php $display = displayErrors($error, 'phone_number'); echo $display; ?>
                    <input class="form-input" id="form-phonenumber-2" type="number" name="phone_number" >
                  </div>
                   <div class="form-wrap">
                    <select  onchange="getSub(this.value)" class="form-control select-filter" data-minimum-results-for-search="Infinity" name="Category">
                      <option value="#">--Select Category--</option>
                      <?php 
                        foreach ($category as $key => $value) {
                            extract($value);
                        
                       ?>
                      <option <?php echo 'value='.$id.'' ?>><?php echo $category_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                <div class="form-wrap">
                <select id ="sub" class="form-control select-filter" data-minimum-results-for-search="Infinity" name="product">
                      <option value="#">--Select Product--</option>
                    </select>
                  </div>
                  <div class="form-wrap">
                  <label class="form-label" for="form-quantity-2">Quantity</label><?php $display = displayErrors($error, 'quantity'); echo $display; ?>
                    <input class="form-input" id="form-quantity-2" type="number" name="quantity" >
                  </div>
                    <div class="form-wrap">
                  <label class="form-label" for="form-adress-2">Main Adress</label><?php $display = displayErrors($error, 'adress'); echo $display; ?>
                    <input class="form-input" id="form-adress-2" type="text" name="adress" >
                  </div>
                  <div class="form-wrap">
                  <label class="form-label" for="form-order-2">Order Message</label><?php $display = displayErrors($error, 'order'); echo $display; ?>
                    <textarea class="form-input" id="form-order-2" type="text" name="order" ></textarea>
                  </div>
                  <div class="form-wrap text-right">
                    <!-- <button class="button button-primary" type="submit" name="submit" value="submit">Request a quote<span class="icon-arrow icon-rotate-90 material-icons-keyboard_backspace"></span></button> -->
                    <input type="submit" name="submit" value="submit">
                  </div>
                </form>
              </div>
            </div>
            </div>
          </div>
          <script type="text/javascript">
            
          function getSub(id){

              var url = 'getProduct';
              var method = 'POST';
              var params = 'Cat=' + id;
              subAjax(url, method, params);
              console.log(params);

          }

          function subAjax(url, method, params){
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function(){
            if(xhr.readyState == 4){
               var res = xhr.responseText;
               console.log(res);
                  
                document.getElementById('sub').innerHTML = res ;
             }
         }
            xhr.open(method, url, true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            xhr.send(params);
        }


          </script>
      <!-- Page Footer-->
     <?php 
     include "includes/footer.php";

      ?>