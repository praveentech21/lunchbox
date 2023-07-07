﻿<?php

include "connect.php";

session_start();
if(isset($_SESSION['uname'])){
  header("location:parent.php");
}
if(isset($_POST['login'])){
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $run = mysqli_fetch_assoc(mysqli_query($con ,"select * from parent where pid = '$uname'"));
  if(mysqli_num_rows(mysqli_query($con ,"select * from parent where pid = '$uname'"))==0){
    echo "<script>alert('You had Entered Invalid Username or Password');</script>";
  }
  elseif($run['pass']==$pass){
    $_SESSION['uname'] = $uname;
    header("location:parent.php");
  }
}
// All Setted Shiva and this is sending to git as All set SHiva
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta tags  -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <title>Parent Login</title>
  <link rel="icon" type="image/png" href="Bhavani/images/favicon.png">

  <!-- CSS Assets -->
  <link rel="stylesheet" href="Bhavani/css/app.css">

  <!-- Javascript Assets -->
  <script src="Bhavani/js/app.js" defer=""></script>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
  <link
    href="css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">
  <script>
    /**
     * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
     */
    localStorage.getItem("_x_darkMode_on") === "true" &&
      document.documentElement.classList.add("dark");
  </script>
</head>

<body x-data="" class="is-header-blur" x-bind="$store.global.documentBody">
  <!-- App preloader-->
  <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
    <div class="app-preloader-inner relative inline-block h-48 w-48"></div>
  </div>

  <!-- Page Wrapper -->
  <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
    <main class="grid w-full grow grid-cols-1 place-items-center">
      <div class="w-full max-w-[26rem] p-4 sm:px-5">
        <div class="text-center">
          <img class="mx-auto h-16 w-16" src="Bhavani/images/mlogo-removebg-preview.png" style="height: 150px;  width: 350px;"
            alt="logo">
          <div class="mt-4">
            <h2 class="text-2xl font-semibold text-slate-600 dark:text-navy-100">
            Parent Login
            </h2>
            <p class="text-slate-400 dark:text-navy-300">
              Login here
            </p>
          </div>
        </div>
        <div class="card mt-5 rounded-lg p-5 lg:p-7">
          <form action="#" method="post">
          <label class="relative flex">
            <input name="uname"
              class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
              placeholder="Mobile Number" type="text">
            <span
              class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                viewbox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
              </svg>
            </span>
          </label>
          <label class="relative mt-4 flex">
            <input name="pass"
              class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:z-10 hover:border-slate-400 focus:z-10 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
              placeholder="Password" type="password">
            <span 
              class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-colors duration-200" fill="none"
                viewbox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z">
                </path>
              </svg>
            </span>
          </label>
          

          <!-- <div class="mt-4 flex items-center space-x-2">
              <input class="form-checkbox is-basic h-5 w-5 rounded border-slate-400/70 checked:border-primary checked:bg-primary hover:border-primary focus:border-primary dark:border-navy-400 dark:checked:border-accent dark:checked:bg-accent dark:hover:border-accent dark:focus:border-accent" type="checkbox">
              <p class="line-clamp-1">
                I agree with
                <a href="#" class="text-slate-400 hover:underline dark:text-navy-300">
                  privacy policy
                </a>
              </p>
            </div> -->
          <button name="login" type="submit" 
            class="btn mt-5 w-full bg-primary font-medium " style="color: white;" >
            Login
          </button>
          </form>
          <!-- <div class="mt-4 text-center text-xs+">
              <p class="line-clamp-1">
                <span>Already have an account? </span>
                <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent" href="pages-login-1.html">Sign In</a>
              </p>
            </div> -->
          <!-- <div class="my-7 flex items-center space-x-3">
            <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
            <p class="text-tiny+ uppercase">or <a href="#" class="text-slate-400 hover:underline dark:text-navy-300">Register Now as a Parent</a> as a parent</p>
            <div class="h-px flex-1 bg-slate-200 dark:bg-navy-500"></div>
          </div> -->
          <!-- <div class="flex space-x-4">
           <button
              class="btn w-full space-x-3 border border-slate-300 font-medium text-slate-800 hover:bg-slate-150 focus:bg-slate-150 active:bg-slate-150/80 dark:border-navy-450 dark:text-navy-50 dark:hover:bg-navy-500 dark:focus:bg-navy-500 dark:active:bg-navy-500/90"> -->
              <!-- <img class="h-5.5 w-5.5" src="Bhavani/images/logos/google.svg" alt="logo"> -->
              <!-- <a href="delivary.php"><span>Delivery Agent</span></a> 
            </button>
          </div> -->
        </div>
      </div>
    </main>
  </div>

  <!-- 
        This is a place for Alpine.js Teleport feature 
        @see https://alpinejs.dev/directives/teleport
      -->
  <div id="x-teleport-target"></div>
  <script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
  </script>
</body>

</html>