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
    <div class="container">
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
            <i class="material-icons" style="font-size: 65px; color: white; width: 100%;">shopping_cart</i>
            <div class="cart-items">
                2<br>
            </div>
        </div>
    </div>
</nav>
<nav class="lower-navbar">
    <div class="container">
        <li><i class="material-icons">home</i></li>
        <li>
            <a href=<?= base_url().'ochraniacze' ?>>OCHRONA</a>
        </li> 
        <li>
             <a href=<?= base_url().'trening' ?>>TRENING</a>
        </li>
        <li>
             <a href=<?= base_url().'obuwie' ?>>OBUWIE</a>
        </li>
        <li>
             <a href=<?= base_url().'odziez' ?>>ODZIEŻ</a>
        </li>
       <?php if($this->session->has_userdata('login')){ ?> 
        <li class="nav-icons" style="padding-left:0px"><?= $this->session->login ?></li>
         <a href=<?= base_url().'wyloguj' ?>><li class="nav-icons"><i class="material-icons">exit_to_app</i></li></a> 
       <?php }else{ ?>
            <li class="nav-icons" id="navUser" ><i class="material-icons">person_outline</i></li>
       <?php } ?>
        <li class="nav-icons" id="navSearch"><i class="material-icons">search</i></li>
        <form class="navUserForm" action="auth" method="POST">
            <input type="submit" value="zaloguj" class="navFormButton"> 
            <input type="password" name="password" value="" class="navUserForm fixWidth" placeholder="hasło">
            <input type="text" name="login" value="" class="navUserForm fixWidth" placeholder="login">
        </form>
    </div>
</nav>


</body>
</html>