<!DOCTYPE html>
<html>
<head>
		<title><?= $title ?></title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href=<?= base_url().'assets/style.css'; ?>>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed" rel="stylesheet">
</head>
<body>
<div class="scrolltop">
    <a href="#"><i class="fa fa-angle-up fa-3x" aria-hidden="true"></i></a>
</div>
<nav class="upper-navbar">
    <div class="container noPadding">
        <div class="logo">
            <div class="logo-navbar">
                <div class="logo-image">
                    <a href=<?= base_url() ?>>
                        <img src=<?= base_url().'assets/logo.png' ?> width="100%">
                    </a>
                </div>
                <div class="logo-nav">
                    <a class="logo-nav-element" href=<?= base_url().'firma' ?> style="padding-left: 0 !important">
                        FIRMA
                    </a>
                    <a class="logo-nav-element" href=<?= base_url().'kontakt' ?>>
                        KONTAKT
                    </a>
                    <a class="logo-nav-element" href=<?= base_url().'wspolpraca' ?>>
                        WSPÓŁPRACA
                    </a>
                    <a class="logo-nav-element" href=<?= base_url().'lokalizacja' ?> style="border-right: 0 !important">
                        LOKALIZACJA
                    </a>
                </div>
            </div>
        </div>
        <div class="cart">
                <i class="material-icons" id="cart-icon" data-toggle="modal" data-target="#cart" style="font-size: 60px; color: white;" onclick="getCartItems('<?= base_url() ?>')">shopping_cart</i>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Twój koszyk</h4>
            </div>
            <form>
                <div class="modal-body">
                
                </div>
                <div class="modal-footer">
                    <center>
                        <button type="button" class="btn" data-dismiss="modal" >Kup zaznaczone</button>
                        <button type="button" class="btn" data-dismiss="modal" onclick="delSelected('<?= base_url() ?>')">Usuń zaznaczone</button>
                    </center>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</nav>
<nav class="lower-navbar">
    <div class="container noPadding">
      <?php if(isset($category) && $category=="index"){ ?>
        <li class="mainOption">
             <a href=<?= base_url() ?>>GŁÓWNA</a>
        </li>
      <?php }else{ ?>
          <li>
             <a href=<?= base_url() ?>>GŁÓWNA</a>
          </li>
       <?php  } ?>
       <?php if(isset($category) && $category=="obrona"){ ?>
        <li class="mainOption">
             <a href=<?= base_url().'sklep/obrona' ?>>OCHRONA</a>
        </li>
      <?php }else{ ?>
          <li>
             <a href=<?= base_url().'sklep/obrona' ?>>OCHRONA</a>
          </li>
       <?php  } ?>
       <?php if(isset($category) && $category=="trening"){ ?>
        <li class="mainOption">
             <a href=<?= base_url().'sklep/trening' ?>>TRENING</a>
        </li>
      <?php }else{ ?>
          <li>
             <a href=<?= base_url().'sklep/trening' ?>>TRENING</a>
          </li>
       <?php  } ?>
       <?php if(isset($category) && $category=="obuwie"){ ?>
        <li class="mainOption">
             <a href=<?= base_url().'sklep/obuwie' ?>>OBUWIE</a>
        </li>
      <?php }else{ ?>
          <li>
             <a href=<?= base_url().'sklep/obuwie' ?>>OBUWIE</a>
          </li>
       <?php  } ?>
       <?php if(isset($category) && $category=="ciuchy"){ ?>
        <li class="mainOption">
             <a href=<?= base_url().'sklep/ciuchy' ?>>ODZIEŻ</a>
        </li>
      <?php }else{ ?>
          <li>
             <a href=<?= base_url().'sklep/ciuchy' ?>>ODZIEŻ</a>
          </li>
       <?php  } ?>

       <?php if($this->session->has_userdata('login')){ ?> 
        <li class="nav-icons" style="padding-left:0px"><?= $this->session->login ?></li>
         <a href=<?= base_url().'wyloguj' ?>><li class="nav-icons"><i class="material-icons">exit_to_app</i></li></a> 
       <?php }else{ ?>
            <li class="nav-icons" id="navUser" ><i class="material-icons">person_outline</i></li>
       <?php } ?>
        <li class="nav-icons" id="navSearch"><i class="material-icons">search</i></li>
        <form class="navUserForm" method="POST" action=<?= base_url().'auth' ?>>
            <input type="submit" value="zaloguj" class="navFormButton"> 
            <input type="password" name="password" value="" class="navUserForm fixWidth" placeholder="hasło">
            <input type="text" name="login" value="" class="navUserForm fixWidth" placeholder="login">
        </form>
    </div>
</nav>


</body>
</html>