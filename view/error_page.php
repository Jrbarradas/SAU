<!DOCTYPE html>
<html lang="en">

<?php 
include './dynamic/head.php';
?>
 
<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">

      <?php include './dynamic/profile.php' ?>

      <nav class="nav-menu">
          <?php include './dynamic/menu.php'?>
      </nav><!-- .nav-menu -->
      <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>SAU</h2>
          <ol>
            <li><a href="home.php">Home</a></li>
            <li>SAU</li>
          </ol>
        </div>

      </div>
    </section>

    <style>
        .box {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top:10px;
        }

        .box div {
        width: 500px;
        height: 500px;
        }
    </style>
    
<div class="box">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
            </div>
        </div>
    </div>
</div>


