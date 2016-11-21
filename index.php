<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LinkRoll</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#page-top">LinkRoll</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  
                    <li class="page-scroll">
                        <a href="http://127.0.0.1/projects/linkroll/">Accueil</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

   <div class="container">

      <?php
        echo '<br/><br/><br/><br/><br/><br/>';
        // Afficher les données du fichiers texte
        $data = file("liens.txt");
        //Compter le nombre de ligne
        $nbLine = count($data);

        $categories = array();

        echo '<hr><h2>' . "Deux sites au hasard" . '</h2>';

        $id = array_rand($data);
        $id2 = array_rand($data);

     

        while($id == $id2)
        {
          $id2 = array_rand($data);
        }
        // Séparé les catégories du site par la virgule
        //Utilisation des 'values' pour sortir 2 sites différents
        $values = explode(',', $data[$id]);
        $values2 = explode(',', $data[$id2]);
        
        //Affichage des deux sites aléatoires mis dans un tableau
        echo '<div class="row">';
        echo '<div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="http://www.apercite.fr/apercite/240x180/yes/http://' . $values[0] . ' " >
                        <div class="caption">
                          <center><h3>' . $values[0] . '</center></h3>
                          <p><center><a href="http://' . $values[0] . '" class="btn btn-default" role="button" alt="Image du site de pêche">Accéder</a></center></p>
                        </div>
                      </div>
                    </div>';         

        echo '<div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="http://www.apercite.fr/apercite/240x180/yes/http://' . $values2[0] . ' " >
                        <div class="caption">
                          <center><h3>' . $values2[0] . '</center></h3>
                          <p><center><a href="http://' . $values2[0] . '" class="btn btn-default" role="button" alt="Image du site de pêche">Accéder</a></center></p>
                        </div>
                      </div>
                    </div>';
        echo '</div>';
      

        for ($i = 0; $i < $nbLine; $i++) {
          $values = explode(',', $data[$i]);
          $cat = $values[1];
          if (!in_array($cat, $categories)) {
            $categories[] = $cat;

          }
        }

        //Classé par ordre alphabétique
        sort($categories);
        sort($data);

        $n = 0;
        $b = false;
        foreach ($categories as $cat) {
          if ($n != 0 && !$b) {
            echo '</div>';
          }
         //Séparé les sites des catégories 
          echo '<h1>' . $cat . '</h1><hr>';
          $o = 0;
          for ($i = 0; $i < $nbLine; $i++) {
            $values = explode(',', $data[$i]);
            if ($cat == $values[1]) {
              $b = false;
              if ($o == 0) {
                echo '<div class="row">';
              }
               //Affichage des sites avec vignette "apercite" dans le tableau
               echo '<div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="http://www.apercite.fr/apercite/240x180/yes/http://' . $values[0] . ' ">
                        <div class="caption">
                          <center><h3>' . $values[0] . '</center></h3>
                          <p><center><a  href="http://' . $values[0] . ' " class="btn btn-default" role="button" alt="Image du site de pêche">Accéder</a></center></p>
                        </div>
                      </div>
                    </div>';
              $o++;
              if ($o == 3) {
                echo '</div>';
                $b = true;
                $o = 0;
              }
            }
          }
          $n++;
        }
        

      ?>

    </div> 

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
