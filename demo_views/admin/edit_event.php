<?php
ob_start();
session_start();
include("include/link_include.php");
include("include/authentication.php");
include("include/levelcheck.php");
include("include/student_limit.php");
include("include/level1_limit.php");
authenticate();
if(isset($_SESSION['id'])){
  $session = $_SESSION['id'];
}
$edit_info = getEditInfo($conn,$_GET['id'],'event');
$info = adminInfo($conn,$session);
extract($info);
$fname = ucwords($firstname);
$lname = ucwords($lastname);
$error= [];
if(array_key_exists('submit', $_POST)){

  if(empty($_POST['event_name'])){
    $error['event_name']="Enter a Event_name";
  }
  if(empty($_POST['event_location'])){
    $error['event_location']="Enter a event_location";
  }


  if(empty($error)){
    $clean = array_map('trim', $_POST);


    updateEvent($conn,$clean,$hash_id, $_GET['id']);
  }
}
 ?>
<section id="content">
<div class="container">
<div class="row">
  <?php if (isset($_GET['success'])){
  $msg = str_replace('_', ' ', $_GET['success']);
    echo '<div class="col-md-12">
  <div class="inner-box posting">
  <div class="alert alert-success alert-lg" role="alert">
  <h2 class="postin-title">✔ Successful! '.$msg.' </h2>
  <p>Thank you '.ucwords($firstname).', Hathany Cosmos Foundations  is happy to have you around. </p>
  </div>
  </div>
  </div>';
  } ?>
<div class="col-sm-12 col-md-10 col-md-offset-1">
<div class="page-ads box">
<h2 class="title-2">Welcome to the event page</h2>
<div class="row search-bar mb30 red-bg">
<div class="advanced-search">
<form class="search-form" method="get">
<div class="col-md-4 col-sm-12 search-col">
<h3>Please post your Event</h3>
</div>
</form>
</div>
</div>
<form class="form-ad" action="" method="post" enctype="multipart/form-data">
<div class="form-group mb30">
<label class="control-label">Event Name</label><?php $display = displayErrors($error, 'event_name');
echo $display ?> <input class="form-control input-md" name="event_name" placeholder="Write a event name"  type="text" value="<?php echo $edit_info['event_name']?>">
</div>
<div class="form-group mb30">
<label class="control-label">Event Location</label><?php $display = displayErrors($error, 'event_location');
echo $display ?> <input class="form-control input-md" name="event_location" placeholder=""  type="text" value="<?php echo $edit_info['event_location']?>">
</div>
<div class="col-md-4 col-sm-4 col-xs-12 search-bar search-bar-nostyle">
</div>
<br>
<br>
<br>
<div class="form-group mb30">
<label class="control-label" for="textarea">About</label>
<?php $display = displayErrors($error, 'about');
echo $display ?>
<textarea class="form-control"  id="editor" name="about" placeholder="Write your event description here" rows="4"><?php echo $edit_info['about']?></textarea>
</div>
  <br/>

<br/>
<br/>
<br/>
<br>
<input type="submit" class="btn btn-common" name="submit" value="Add">
</form>
</div>
</div>
</div>
</div>
</section>
<a class="back-to-top" href="#"><i class="fa fa-angle-up"></i></a>
<!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> -->
<!-- <script>
  ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
      console.log( editor );
    } )
    .catch( error => {
      console.error( error );
    } );
</script> -->


<script src="assets/js/jquery-min.js" type="text/javascript">
  </script>
  <script type="text/javascript">
   // CKEDITOR.replace( 'editor1',
   // {
  	// 	toolbarGroups :
  	// 	[
   //      	{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
   //        	{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
   //          { name: 'links' },
   //            { name: 'insert' },
   //              	{ name: 'others' },
   //            	{ name: 'forms' },
   //            { name: 'tools' },
   //            '/',
   //            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
   //            { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
   //            { name: 'styles' },
   //            { name: 'colors' },
  	// 	]
  	// });

    $(document).ready(function() {
      $('pre').each(function(i, block) {
        hljs.highlightBlock(block);
      });
    });

    class MyUploadAdapter {
        constructor( loader, url ) {
            // The FileLoader instance to use during the upload. It sounds scary but do not
            // worry — the loader will be passed into the adapter later on in this guide.
            this.loader = loader;

            // The upload URL in your server back-end. This is the address the XMLHttpRequest
            // will send the image data to.
            this.url = url;
        }

        upload() {
            return new Promise( ( resolve, reject ) => {
                this._initRequest();
                this._initListeners( resolve, reject );
                this._sendRequest();
            } );
        }

        abort() {
          if ( this.xhr ) {
              this.xhr.abort();
          }
      }

      _initRequest() {
           const xhr = this.xhr = new XMLHttpRequest();
           // Note that your request may look different. It is up to you and your editor
           // integration to choose the right communication channel. This example uses
           // the POST request with JSON as a data structure but your configuration
           // could be different.
           xhr.open( 'POST', this.url, true );
           console.log(xhr);
           xhr.responseType = 'json';
       }

       _initListeners( resolve, reject ) {
            const xhr = this.xhr;
            const loader = this.loader;
            const genericErrorText = 'Couldn\'t upload file:' + ` ${ loader.file.name }.`;
            xhr.addEventListener( 'error', () => reject( genericErrorText ) );
            xhr.addEventListener( 'abort', () => reject() );
            xhr.addEventListener( 'load', () => {
                const response = xhr.response;
                // console.log(xhr.responseText);

                // This example assumes the XHR server's "response" object will come with
                // an "error" which has its own "message" that can be passed to reject()
                // in the upload promise.
                //
                // Your integration may handle upload errors in a different way so make sure
                // it is done properly. The reject() function must be called when the upload fails.
                if ( !response || response.error ) {
                    return reject( response && response.error ? response.error.message : genericErrorText );
                }

                // If the upload is successful, resolve the upload promise with an object containing
                // at least the "default" URL, pointing to the image on the server.
                // This URL will be used to display the image in the content. Learn more in the
                // UploadAdapter#upload documentation.
                resolve( {
                    default: response.url
                } );
            } );

            // Upload progress when it is supported. The FileLoader has the #uploadTotal and #uploaded
            // properties which are used e.g. to display the upload progress bar in the editor
            // user interface.
            if ( xhr.upload ) {
                xhr.upload.addEventListener( 'progress', evt => {
                    if ( evt.lengthComputable ) {
                        loader.uploadTotal = evt.total;
                        loader.uploaded = evt.loaded;
                    }
                } );
            }
        }

        _sendRequest() {
           // Prepare the form data.
           const data = new FormData();
           data.append( 'upload', this.loader.file );
           // console.log(this.loader.file);
           // Send the request.
           this.xhr.send( data );

       }

        // ...
    }

    function MyCustomUploadAdapterPlugin( editor,createUploadAdapter ) {

        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            // Configure the URL to the upload script in your back-end here!

            return new MyUploadAdapter( loader, 'upload2server' );
        };
    }




    ClassicEditor
        .create( document.querySelector( '#editor' ),{

          // toolbars: ['imageUpload'],
          extraPlugins: [ MyCustomUploadAdapterPlugin ],
        })


        .catch( error => {
            console.error( error );
        } );



  </script>
<script src="assets/js/bootstrap.min.js" type="text/javascript">
  </script>
<script src="assets/js/material.min.js" type="text/javascript">
  </script>
<script src="assets/js/material-kit.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.parallax.js" type="text/javascript">
  </script>
<script src="assets/js/owl.carousel.min.js" type="text/javascript">
  </script>
<script src="assets/js/wow.js" type="text/javascript">
  </script>
<script src="assets/js/main.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.counterup.min.js" type="text/javascript">
  </script>
<script src="assets/js/waypoints.min.js" type="text/javascript">
  </script>
<script src="assets/js/jasny-bootstrap.min.js" type="text/javascript">
  </script>
<script src="assets/js/form-validator.min.js" type="text/javascript">
  </script>
<script src="assets/js/contact-form-script.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.themepunch.revolution.min.js" type="text/javascript">
  </script>
<script src="assets/js/jquery.themepunch.tools.min.js" type="text/javascript">
  </script>
<script src="assets/js/bootstrap-select.min.js">
  </script>
<script src="assets/js/fileinput.js">
  </script>
</body>
<!-- Mirrored from demo.graygrids.com/themes/classix-template/post-ads.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Nov 2017 11:40:57 GMT -->
</html>
