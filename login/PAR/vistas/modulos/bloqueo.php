<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>APAR | Lockscreen</title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="../bowe_components/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="../dist/css/adminlte.min.css?v=3.2.0">
<script nonce="9175012d-d72a-45a7-a884-98a69de294bc">(function(w,d){!function(bv,bw,bx,by){bv[bx]=bv[bx]||{};bv[bx].executed=[];bv.zaraz={deferred:[],listeners:[]};bv.zaraz.q=[];bv.zaraz._f=function(bz){return function(){var bA=Array.prototype.slice.call(arguments);bv.zaraz.q.push({m:bz,a:bA})}};for(const bB of["track","set","debug"])bv.zaraz[bB]=bv.zaraz._f(bB);bv.zaraz.init=()=>{var bC=bw.getElementsByTagName(by)[0],bD=bw.createElement(by),bE=bw.getElementsByTagName("title")[0];bE&&(bv[bx].t=bw.getElementsByTagName("title")[0].text);bv[bx].x=Math.random();bv[bx].w=bv.screen.width;bv[bx].h=bv.screen.height;bv[bx].j=bv.innerHeight;bv[bx].e=bv.innerWidth;bv[bx].l=bv.location.href;bv[bx].r=bw.referrer;bv[bx].k=bv.screen.colorDepth;bv[bx].n=bw.characterSet;bv[bx].o=(new Date).getTimezoneOffset();if(bv.dataLayer)for(const bI of Object.entries(Object.entries(dataLayer).reduce(((bJ,bK)=>({...bJ[1],...bK[1]})))))zaraz.set(bI[0],bI[1],{scope:"page"});bv[bx].q=[];for(;bv.zaraz.q.length;){const bL=bv.zaraz.q.shift();bv[bx].q.push(bL)}bD.defer=!0;for(const bM of[localStorage,sessionStorage])Object.keys(bM||{}).filter((bO=>bO.startsWith("_zaraz_"))).forEach((bN=>{try{bv[bx]["z_"+bN.slice(7)]=JSON.parse(bM.getItem(bN))}catch{bv[bx]["z_"+bN.slice(7)]=bM.getItem(bN)}}));bD.referrerPolicy="origin";bD.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(bv[bx])));bC.parentNode.insertBefore(bD,bC)};["complete","interactive"].includes(bw.readyState)?zaraz.init():bv.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script></head>
<body class="hold-transition lockscreen">

<div class="lockscreen-wrapper">
<div class="lockscreen-logo">
<a href="../../index2.html"><b>AP</b>AR</a>
</div>

<div class="lockscreen-name"><?php echo $_SESSION['nombre'] ?></div>

<div class="lockscreen-item">

<div class="lockscreen-image">
<img src="../img/profile.png" alt="User Image">
</div>


<form class="lockscreen-credentials">
<div class="input-group">
<input type="password" class="form-control" placeholder="password">
<div class="input-group-append">
<button type="button" class="btn">
<i class="fas fa-arrow-right text-muted"></i>
</button>
</div>
</div>
</form>

</div>

<div class="help-block text-center">
Introduce tu contraseña para recuperar tu sesión
</div>
<div class="text-center">
<a href="cerrarsesion.php">O inicie sesión como un usuario diferente</a>
</div>
<div class="lockscreen-footer text-center">
Copyright &copy; 2021-2023 <b><a href="" class="text-black">APAR</a></b><br>
All rights reserved
</div>
</div>


<script src="../bowe_components/jquery/jquery.min.js"></script>

<script src="../bowe_components/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
