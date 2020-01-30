<style media="screen">
  .fblinka{
    display: inline-block;
      width: 40px;
      height: 40px;
      /* padding:3px; */
      line-height: 37px;
      text-align: center;
      background-color: #3B5998;
      color: #fff;
      border-radius: 50%;
      margin-bottom: 10px;
      border: 2px solid transparent;
      font-size: 15px;
      position: relative;
            margin: 10px;
  }
  .fblinka:hover{
    background-color: #fff;
    color: #3B5998;
      border: 2px solid #3B5998;
        margin-top: 20px;
  }
  .twlinka{
    display: inline-block;
      width: 40px;
      height: 40px;
             /*padding:11px;*/
      line-height: 37px;
      text-align: center;
      background-color: #00ACED;
      color: #fff;
      border-radius: 50%;
      margin-bottom: 10px;
      border: 2px solid transparent;
      font-size: 15px;
      position: relative;
            margin: 10px;
  }
  .twlinka:hover{
    background-color: #fff;
    color: #00ACED;
      border: 2px solid #00ACED;
        margin-top: 20px;
  }
  .inlinka{
    display: inline-block;
      width: 40px;
      height: 40px;
      line-height: 37px;
      text-align: center;
      background-color: #0077B5;
      color: #fff;
             /*padding:11px;*/
      border-radius: 50%;
      margin-bottom: 10px;
      border: 2px solid transparent;
      font-size: 15px;
      position: relative;
            margin: 10px;
  }
  .inlinka:hover{
    background-color: #fff;
    color: #0077B5;
      border: 2px solid #0077B5;
        margin-top: 20px;
  }
  .whlinka{
    display: inline-block;
      width: 40px;
      height: 40px;
      line-height: 37px;
      text-align: center;
      background-color: #27C34B;
      color: #fff;
      border-radius: 50%;
             /*padding:11px;*/
      border: 2px solid transparent;
      font-size: 15px;
      position: relative;
      margin: 10px;
  }
  .whlinka:hover{
    background-color: #fff;
    color: #27C34B;
      border: 2px solid #27C34B;
            margin-top: 20px;
  }
}
</style>
<div style="margin-top:5px;" class="">
  <p style="margin-bottom:2px">Share this with friends</p>
<?php  $uro = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 ?>
    <a href="#" id="blake" class="fblinka" ><i class="fa fa-facebook"></i></a>
    <?php $ur = urlencode($uro); ?>
    <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $ur  ?>"  class="inlinka" ><i class="fa fa-linkedin"></i></a>

    <a target="_blank" href="https://twitter.com/share?url=<?php echo $uro ?>&text=<?php echo $tn?>"  class="twlinka twitter-share" ><i class="fa fa-twitter"></i></a>
    <a href="whatsapp://send?text=<?php echo $tn." ".$uro ?>" data-action="share/whatsapp/share"  class="whlinka" ><i class="fa fa-whatsapp"></i></a>
</div>
<hr>
<div class="fb-comments" data-mobile="true" data-href="<?php echo $uro ?>" data-width="100%" data-numposts="10"></div>
<script type="text/javascript">
document.getElementById('blake').onclick = function(e){
  FB.ui({
    method: 'share',
display: 'popup',
    href: '<?php echo $uro ?>',
  }, function(response){});
  e.preventDefault();
}
</script>
<script>window.twttr = (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0],
  t = window.twttr || {};
  if (d.getElementById(id)) return t;
  js = d.createElement(s);
  js.id = id;
  js.src = "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
  t._e = [];
  t.ready = function(f) {
    t._e.push(f);
  };
  return t;
}(document, "script", "twitter-wjs"));</script>
