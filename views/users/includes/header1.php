<!doctype html>
<html class="no-js" lang="en">
<!-- Mirrored from html.xpeedstudio.com/bagan/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Aug 2018 19:17:55 GMT -->
<head>
  <meta name="theme-color" content="#008435">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php if($page_title !="bb"){ ?>
    <title>Hathany Cosmos Foundations - <?php echo $page_title ?></title>
  <?php } ?>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php if($page_name == "home"){
      echo '<title>'.$page_title.'</title>
      <meta name="description" content="An NGO in Africa advocating for better Agriculture, Environment and Climate" />
      <meta name="keywords" content="NGO,Agriculture">';

    }elseif($page_name == "blog_view"){
      // die(var_dump($blog));
      $bd = previewBody($body, 22);
      $rf = strip_tags($bd);
      $cut = explode(' ',$title);
      $metakeys = implode(',',$cut).",";
      echo '<title>Hathany Cosmos Foundations - '.ucwords($title).'</title>
      <meta name="description" content="'.$rf.'" />
      <meta name="title" content="'.ucwords($title).'">
      <meta name="keywords" content="'.$metakeys.'news, board, speck, Admin, board speck, training">';
    }else{
      echo '<title>'.ucwords($page_title).'</title>
      <meta name="description" content="An NGO in Africa advocating for better Agriculture, Environment and Climate" />
      <meta name="robots" content="nofollow,noindex">
      <meta name="title" content="'.ucwords($page_title).'">
      <meta name="keywords" content="NGO,Hathany Cosmos Foundations">';
      }

      $uri = explode("/", $_SERVER['REQUEST_URI']);
    		if($page_name == "home"){
    			echo '<meta property="og:title" content="Hathany Cosmos Foundations - Home" />
    			<meta property="og:image" content="images/log.png" />
    			<meta property="og:image:width" content="450"/>
    			<meta property="og:image:height" content="298"/>
    			<meta property="og:description" content="An NGO in Africa advocating for better Agriculture, Environment and Climate" />';
    			echo '<meta name="twitter:card" content="summary_large_image">
    			<meta name="twitter:site" content="@KIMTEYGhandle">
    			<meta name="twitter:title" content="Hathany Cosmos Foundations - Home">
    			<meta name="twitter:description" content="An NGO in Africa advocating for better Agriculture, Environment and Climate">
    			<meta name="twitter:image" content="images/log.png">
    			<meta name="twitter:image:width" content="280">
    			<meta name="twitter:image:height" content="150">';
    		}elseif($page_name == "blog_view"){
          $bd = previewBody($body, 22);
    			$rf = strip_tags($bd);
    			echo '<meta property="og:title" content="Hathany Cosmos Foundations - '.$title.'" />
    			<meta property="og:type" content="article" />
    			<meta property="og:image" content="https://hcfoundations.com/'.$image_1.'" />
    			<meta property="og:image:width" content="450"/>
    			<meta property="og:image:height" content="298"/>
    			<meta property="og:description" content="'.$rf.'" />';
    			echo '<meta name="twitter:card" content="summary_large_image">
    			<meta name="twitter:site" content="@KIMTEYGhandle">
    			<meta name="twitter:title" content="Hathany Cosmos Foundations - '.$title.'">
    			<meta name="twitter:description" content="'.$rf.'">
    			<meta name="twitter:image" content="https://hcfoundations.com/'.$image_1.'">
    			<meta name="twitter:image:width" content="280">
    			<meta name="twitter:image:height" content="150">';
    		}elseif($page_name == "project"){
          $bd = previewBody($about, 22);
    			$rf = strip_tags($bd);
    			echo '<meta property="og:title" content="Hathany Cosmos Foundations Project - '.$project_name.'" />
    			<meta property="og:type" content="article" />
    			<meta property="og:image" content="https://hcfoundations.com/'.$image_1.'" />
    			<meta property="og:image:width" content="450"/>
    			<meta property="og:image:height" content="298"/>
    			<meta property="og:description" content="'.$rf.'" />';
    			echo '<meta name="twitter:card" content="summary_large_image">
    			<meta name="twitter:site" content="@KIMTEYGhandle">
    			<meta name="twitter:title" content="Hathany Cosmos Foundations - '.$project_name.'">
    			<meta name="twitter:description" content="'.$rf.'">
    			<meta name="twitter:image" content="https://hcfoundations.com/'.$image_1.'">
    			<meta name="twitter:image:width" content="280">
    			<meta name="twitter:image:height" content="150">';
    		}else{
    			echo '<meta property="og:title" content="Hathany Cosmos Foundations" />
    			<meta property="og:image" content="https://hcfoundations.com/images/log.png" />
    			<meta property="og:image:width" content="200"/>
    			<meta property="og:image:height" content="200"/>
    			<meta property="og:description" content="An NGO in Africa advocating for better Agriculture, Environment and Climate" />';
    			echo '<meta name="twitter:card" content="summary" />
    			<meta name="twitter:site" content="@KIMTEYGhandle" />
    			<meta name="twitter:title" content="Hathany Cosmos Foundations" />
    			<meta name="twitter:description" content="An NGO in Africa advocating for better Agriculture, Environment and Climate">
    			<meta name="twitter:image" content="https://hcfoundations.com/images/log.png" />';
    		}
?>



    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link rel="icon" type="image/png" href="favicon.html">
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html">

    <link rel="stylesheet" href="asset/css/fontawesome-min.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/xsIcon.css">
    <link rel="stylesheet" href="asset/css/iconmoon.css">
    <link rel="stylesheet" href="asset/css/isotope.css">
    <link rel="stylesheet" href="asset/css/magnific-popup.css">
    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">
    <link rel="stylesheet" href="asset/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="asset/css/navigation.css">
    <link rel="stylesheet" href="asset/css/animate.css">

    <!--Theme custom css -->
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="/ken/css/style.css">

    <!--Theme Responsive css-->
    <link rel="stylesheet" href="asset/css/responsive.css"/>
    <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v3.0&appId=1812385998866349&autoLogAppEvents=1';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

    <!-- use only color version -->
    <!-- <link rel='stylesheet' type='text/css' href='asset/css/colors/color-1.css' > -->
</head>
<style media="screen">
.bola-section{
  display: inline-block;
  margin-left: 10px;
  font-size: 20 px;
	color: white;
}
.author .author-img {
	float: left;
	margin-right: 30px;
}
.author .author-text .author-title {
	width: 100%;
	height: 34px;
}
.author .author-text h3 {
	font-size: 22px;
	font-weight: 400;
	margin-bottom: 26px;
}
.author .author-text p {
	color: #888;
	line-height: 26px;
}
.inner-box {
    border: 1px solid #eee;
    padding: 30px;
    margin-bottom: 30px;
}
.social-link a {
    color: #CACACA;
    text-align: center;
    width: 32px;
    border: 1px solid #CACACA;
    line-height: 32px;
    border-radius: 0px;
    display: inline-block;
    height: 32px;
}
.social-link .facebook:hover {
    color: #3b5998;
    border-color: #3b5998;
}
.social-link .twitter:hover {
    color: #55acee;
    border-color: #55acee;
}
.social-link .instagram:hover {
    color: #dd4b39;
    border-color: #dd4b39;
}
.social-link .linkedin:hover {
    color: #007bb5;
    border-color: #007bb5;
}
@media only screen and (max-width:600px){
	#ddd{
	display:inline-block
	}
	#aaa{
		display:inline-block
	}
}
</style>
<style media="screen">
  .fblinka{
    display: inline-block;
      width: 40px;
      height: 40px;
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

<body>
<!--[if lt IE 10]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- <div id="preloader">
    <div class="preloader-wrapper">
        <div class="la-ball-clip-rotate-pulse la-2x">
            <div></div>
            <div></div>
        </div>
    </div>
    <a href="#" class="cancel-preloader">Cancel Preloader</a>
</div> -->
	<!-- END prelaoder -->

<!-- header top section -->
<section class="xs-header-top">
 <div class="container">
     <div class="row">
            <div class="col-lg-6 col-md-8">
                <div class="header-top-info">
                    <ul>
                        <!-- <li><i class="icon icon-map-marker2"></i> 1105 Roosevelt Street, CA 94903</li> -->
                        <li><i class="icon icon-envelope"></i> KIMTEYGhandle@gmail.com</li>
                    </ul>
                </div>
            </div><!-- .col end -->

            <div class="col-lg-6 align-self-center col-md-4">
                <div class="header-top-social">
                    <ul>
                        <li><a href="https://facebook.com/KIMTEYGhandle"><i class="fa fa-facebook-f"></i></a></li>
                        <li><a href="https://twitter.com/KIMTEYGhandle"><i class="fa fa-twitter"></i></a></li>
                        <!-- <li><a href=""><i class="fa fa-google-plus"></i></a></li> -->
                        <li><a href="https://instagram.com/KIMTEYGhandle"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div><!-- .col end -->
        </div><!-- .row end -->
 </div><!-- .container end -->
</section><!-- End header section -->

<!-- header middle section -->
<section class="xs-header-middle">
 <div class="container">
     <div class="row">
            <div class="col-md-3 align-self-center">
                <div class="logo">
                    <a href="index">
                        <img src="Hathany Cosmos Foundations.png" alt="">
                    </a>
                </div>
            </div>
            <div class="align-self-center col-md-9">
                <!-- <div class="header-middle-info float-right">
                    <ul>
                        <li>
                            <i class="icon-iso"></i>
                            <label>Certifide Company</label>
                            <p>We are ISO certifide company </p>
                        </li>
                        <li>
                            <i class="icon-number_1"></i>
                            <label>Best Gardening</label>
                            <p>Service provider of 2017</p>
                        </li>
                    </ul>
                </div> -->
            </div>
        </div>
 </div><!-- .container end -->
</section><!-- End header middle section -->

<!-- header nav section -->
<header class="xs-header-nav">
    <div class="container">
        <div class="row  menu-item">
            <div class="col-lg-12">
                <nav id="navigation1" class="navigation header-nav clearfix">

                    <div class="nav-header">
                        <!--  <a class="nav-brand" href="#"></a>-->
                        <a href="index" class="mobile-logo">
                            <img src="Hathany Cosmos Foundations.png" alt="">
                        </a>
                        <div class="nav-toggle"></div>
                    </div>

                    <div class="nav-menus-wrapper clearfix">
                        <ul class="nav-menu">
                            <li class="active"><a href="home">Home</a>

                            </li>
                            <li>
                                <a href="services">Our Services</a>

                            </li>
                            <li><a href="project">Projects</a></li>
                            <li><a href="blog">Blog</a>

                            </li>
                            <li><a href="about">About us</a></li>
                            <li>
                                <a href="contact">Contact</a>

                            </li>
                        </ul>
                        <div class="header-nav-right-info align-to-right">
                            <label><i class="icon icon-phone3"></i> 08160000000</label>
                        </div>

                    </div>

                </nav>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</header><!-- End header nav section -->
