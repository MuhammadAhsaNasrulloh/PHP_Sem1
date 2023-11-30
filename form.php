<?php defined('BASEPATH') or die("No Access Allowed");?>

<h2 class="index-header">Selamat Datang di Aplikasi E-Voting</h2>
<div class="row">
    <div class="col-md-4 col-md-offset-1">
        <div id="content-slider">
            <img src="./assets/img/Logo MPK.png" class="img" alt="Slideshow 2" >
            <img src="./assets/img/voting.png" class="img" alt="Slideshow 3" >
        </div>
    </div>
    <div class="col-md-6 form">
        <span class="info-login">Silahkan Login untuk dapat melakukan pemilihan</span>
        <br />
        <br />
        <form action="" method="post">
            <div class="form-group">
                <label>Masukkan ID :</label>
                <input type="number" class="form-control" placeholder="ID" required="Id" name="Id"/>
            </div>
            <br />
            <div class="row">
            
                <div class="text-right" style="padding-right:15px;">
                    <input type="submit" name="submit" class="btn btn-success btn-lg" value="Login">
                </div>
            </div>
        </form>
        
    </div>
</div>
