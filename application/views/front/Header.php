<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.ico">

    <title>SIPUMA</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/theme/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="<?php echo base_url();?>assets/theme/assets/css/image-style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/theme/assets/css/pagination-style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/theme/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/theme/assets/css/font-awesome.min.css" rel="stylesheet">
       <link href="<?php echo base_url();?>assets/themes/home/css/animate.css" rel="stylesheet" media="screen" />


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="<?php echo base_url();?>assets/theme/assets/js/modernizr.js"></script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=590bf30cef4e1400122869e4&product=inline-share-buttons"></script>
  </head>

  <body>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.9&appId=930671203663717";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a  href="index.html"><img src="<?php echo base_url();?>assets/theme/assets/img/logo.png" width="200px" heigh="200px"></a>
        </div>
        <div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?php echo base_url()?>C_front">HOME</a></li>
            <li><a href="about.html">ABOUT</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">BERITA<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="<?php echo base_url()?>C_front/info">INFO</a></li>
                <li><a href="single-post.html">EVENT/SEMINAR</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url()?>C_front/berita">BERITA</a></li>
            <li><a href="<?php echo base_url()?>C_front/pengumuman">PENGUMUMAN</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
