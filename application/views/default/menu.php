<div class="container-fluid">
  <div class="row">
<nav class="navbar navbar-inverse" id="menu">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="http://php-rookie.com/">PHP-Rookie</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav">
        <?php if ($level=="admin") {
          ?>
          <li><a href="#">Menu Admin 1</a></li>
          <li><a href="#">Menu Admin 2</a></li>
          <?php
        }elseif ($level=="user") {
          ?>
          <li><a href="#">Menu User 1</a></li>
          <li><a href="#">Menu User 2</a></li>
          <?php
        } ?>
        <li><a href="">Logout</a></li>
      </ul>
      
    </div>
  </div>
</nav>
</div>
</div>
<?php
if ($level=="admin") {
  $this->load->view('halamanadmin');
}elseif ($level=="user") {
  $this->load->view('halamanuser');
}
 ?>