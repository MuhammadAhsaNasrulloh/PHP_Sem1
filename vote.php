<?php
define("BASEPATH", dirname(__FILE__));
session_start();
if (!isset($_SESSION['siswa'])) {
   header('location:./index.php');
}

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>E - Voting</title>
      <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
      <link rel="stylesheet" href="./assets/css/animate.css"/>
      <style media="screen">
         body {
            background-color: #011b3b;
            color:#fff;
         }
         .img {
            height: 200px;
            width: 196px;
            margin-bottom: 20px;
         }

         .button.success {
           background-color: #059f3e;
           color: #ebebeb;
         }

         .button.success:hover, .button.success:focus {
            background-color: #22bb5b;
            color: #fefefe;
         }
         .nama {
           position:absolute;
           background: rgba(35, 35, 35, 0.624);
           width: 196px;
           top: 178px;
           font-size:16px;
           padding:3px 5px;
         }
         .btn-logout, .title-btn{
            text-decoration : none;
            color: #fff;
            margin-left: 3%;
            background : #059f3e;
            padding : 5px 10px 5px 10px;
            border-radius : 5px;
            text-align : center;
         }
      </style>
   </head>
   <body>
      <div class="container">
         <?php
         require('./include/connection.php');

         $thn = date('Y');
         $dpn = date('Y') + 1;
         $periode = $thn . '/' . $dpn;

         $sql = $con->prepare("SELECT * FROM t_kandidat WHERE periode = ?") or die($con->error);
         $sql->bind_param('s', $periode);
         $sql->execute();
         $sql->store_result();
         if ($sql->num_rows() > 0) {
            $numb = $sql->num_rows();
            echo '<div class="text-center" style="padding-top:20px;">
                     <h2>Daftar Calon Ketua MPK Periode ' . $periode . '</h2>
                  </div>
                  <hr />';

            echo '<div class="row">';

            echo '<div class="col-md-10 col-md-offset-1">';
            ?>
               <div class="btn btn-logout">
                      <a class="title-btn" href="./logout.php">Kembali</a>
               </div>
               <?php
               for ($i = 1; $i <= $numb; $i++) {
                  $sql->bind_result($id, $nama, $foto, $visi, $misi, $suara, $periode);
                  $sql->fetch();
                  ?>
                              <div class="col-md-3">
                                <section class="wow fadeInDown" data-wow-delay="<?php echo $i; ?>s">
                                  <div class="thumbnail">  
                                    <div class="text-center">
                                       <img src="./assets/img/kandidat/<?php echo $foto; ?>" class="img">
                                       <p class="nama"><?php echo $nama; ?></p>
                                       <div class="caption">
                                          <a href="./submit.php?id=<?php echo $id; ?>&s=<?php echo $suara; ?>" class="btn btn-success btn-block">Beri Suara</a>
                                       </div>
                                      </div>
                                     </div>
                                 </section>
                              </div>
                        

                     <?php
               }
         } else {

            echo '<div class="callout warning">
                        <h2>Belum Ada Calon Ketua</h2>
                        <a href="logout.php">Kembali</a>
                     </div>';
         }

         echo '</div>';

         echo '</div>';
         ?>
      </div>

      <script type="text/javascript" src="./assets/js/jquery.js"></script>
      <script type="text/javascript" src="./assets/js/wow.js"></script>
      <script type="text/javascript">
         wow = new WOW(
            {
               animateClass: 'animated',
               offset:100,
               callback:function(box) {
                  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
               }
            }
         );
         wow.init();
      </script>
   </body>
</html>
