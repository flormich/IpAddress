<!DOCTYPE HTML>
<html>

  <head>
      <title>Ip Address</title>
      <!-- <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">       -->
      <meta http-equiv="Content-Type" content="text/html; utf-8">      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Addresse IP Lorge">
  
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
      <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-indigo.min.css">
      <link rel="stylesheet" href="/assets/css/tuiles.css">
      <link rel="stylesheet" href="/assets/css/essai.css">
      <link rel="stylesheet" href="/assets/css/dropdown.css">
      <link rel="stylesheet" href="/assets/css/ipFree.css">

      <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>   
  </head>  

  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header backgroundPage" >
      <div class="mdl-card mdl-cell mdl-cell--12-col backgroundPage">
        <header class="mdl-layout__header">
          <div class="mdl-layout__header-row">

          <!-- home -->
            <a href="/public/"><img class="icoNiveau1" src="/assets/img/Home.png" alt="Homepage" title="Homepage"></a>
          <!-- Ping total -->
            <!-- <a class="mdl-navigation__link"  href="/template/app/pingTotalite.html.php">Ping Total</a> -->
            <a href="/public/index.php/pingOkDansBDD">Ping Total</a>
          <!-- Ping Update -->
            <a href="/public/index.php/ipUpdatePing"><img class="icoNiveau1" src="/assets/img/Refresh.png" alt="Update Ping" title="Mise a jour avec ping"></a>
            <a href="/public/index.php/ipUpdateCron"><img class="icoNiveau1" src="/assets/img/RefreshCron.png" alt="Update Cron" title="Mise a jour avec cron"></a>

          <!-- Drop down 1 --> 
          <ul class="niveau1 ">
            <li>
              <a href="/public/"><img class="icoNiveau1" src="/assets/img/Find.png" alt="Find material" title="Afficher"></a>
              <ul class="niveau2 DropDownMenu">
                <li>
                  <a href="/public/"><img class="icoNiveau2" src="/assets/img/Home.png" alt="Ping All" title="Tout afficher"></a> : Tous
                </li>
                <li>
                  <a href="/public/index.php/pingComputer"><img class="icoNiveau2" src="/assets/img/computer.png" alt="Ping Computer" title="Afficher les ordinateurs"></a> : Ordis
                </li>
                <li>
                  <a href="/public/index.php/pingSrv"><img class="icoNiveau2" src="/assets/img/server-rack.png" alt="Ping Serveur" title="Afficher les serveurs"></a> : Srv
                </li>          
                <li>
                  <a href="/public/index.php/printer"><img class="icoNiveau2" src="/assets/img/Printer.png" alt="Ping Printer" title="Afficher les imprimantes"></a> : Imprimantes
                </li>
                <li>
                  <a href="/public/index.php/label"><img class="icoNiveau2" src="/assets/img/ticket.png" alt="Ping Zebra" title="Afficher les zebras"></a> : Zebras
                </li>
                <li>
                  <a href="/public/index.php/oversight"><img class="icoNiveau2" src="/assets/img/webcam.png" alt="Ping Oversight" title="Afficher la surveillance"></a> : Surveillances
                </li>
                <li>
                  <a href="/public/index.php/other"><img class="icoNiveau2" src="/assets/img/other.png" alt="Ping other" title="Afficher le reste"></a> : Autres
                </li>

                <li>
                  <hr>
                </li>

                <li>
                  <a href="/public/index.php/ok"><img class="icoNiveau2" src="/assets/img/Renew.png" alt="Ping Ok" title="Afficher les OK"></a> : Ok
                </li>
                <li>
                  <a href="/public/index.php/ko"><img class="icoNiveau2" src="/assets/img/Stop.png" alt="Ping Ko" title="Afficher les Ko"></a> : Ko
                </li>
              </ul>
            </li>
          </ul>         
          
          <!-- Drop down 2 --> 
          <ul class="niveau1 ">
            <li>
              <a href="/public/index.php/freeIp"><img class="icoNiveau1" src="/assets/img/folders-searches.png" alt="Sort by " title="Trier par " ></a>
              <ul class="niveau2 DropDownMenu">
                <li>
                  <a href="/public/"><img class="icoNiveau2" src="/assets/img/dedicated-ip.png" alt="Sort by ip" title="Trier par IP" ></a> : Ip
                </li>                                 
                <li>
                  <a href="/public/index.php/byDateKo"><img class="icoNiveau2" src="/assets/img/date.png" alt="Sort by old date ko" title="Trier par date Ko" ></a> : Date Ko
                </li>                                 
                <li>
                  <a href="/public/index.php/byName"><img class="icoNiveau2" src="/assets/img/juk.png" alt="Sort by name" title="Trier par nom" ></a> : Nom
                </li>                                 
                <li>
                  <a href="/public/index.php/byTypeMat"><img class="icoNiveau2" src="/assets/img/Headphones.png" alt="Sort by material type" title="Trier par type de matériel" ></a> : Type de matériel
                </li>                                 
                <li>                                 
                  <a href="/public/index.php/lastAdd"><img class="icoNiveau2" src="/assets/img/last_add.png" alt="Last add" title="Trier par dernier ajout" ></a> : Derniers ajouts
                </li> 
                <li>                                 
                  <a href="/public/index.php/undefinedName"><img class="icoNiveau2" src="/assets/img/Type_wrong.png" alt="Last add" title="Afficher les sans nom"></a> : Undefined Name
                </li> 

                <li>
                  <hr>
                </li>

                <li>
                  <a href="/public/index.php/freeIp"><img class="icoNiveau2" src="/assets/img/freeCat.png" alt="All IpAddress" title="Tous les ip"></a> : Tous les Ip                               
                </li>
                <li>
                  <a href="/public/index.php/freeIpByCat"><img class="icoNiveau2" src="/assets/img/free.png" alt="State Ip" title="Ip par état de connexion"></a> : Par cat conn 
                </li>                                 
              </ul>
            </li>
          </ul>

          <!-- trial -->
            <a href="/public/index.php/trial"><img class="icoNiveau1" src="/assets/img/free.png" alt="TrialPage" title="TrialPage"></a>

          <!-- Space between left icon and dernier ping text -->
            <div class="mdl-layout-spacer"></div>
            <b style="text-align:center"> 
              <?php echo "Dernier Ping effectué le :" . "<br>" . date('d/m/Y', strtotime($_SESSION['date'])). "<br>" . date('H:i', strtotime($_SESSION['date'])); ?> 
            </b>
          
          <!-- Space between left icon and right icon-->
            <div class="mdl-layout-spacer"></div>
          
          <!-- Left icon -->
          <!-- Delete Toute la BDD -->
            <!-- <a  href="/public/index.php/deleteAll"><img class="ico" src="/../assets/img/Trash.png" alt="Delete la BDD" title="Delete la BDD" ></a> -->
            <a href="../../../template/app/search.html.php"><img class="ico" src="/assets/img/Search.png" alt="search" title="Rechercher" style="width:2.3rem"></a>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                        mdl-textfield--floating-label mdl-textfield--align-right">  

          <!-- search / chercher / rechercher -->
              <label class="mdl-button mdl-js-button mdl-button--icon" for="fixed-header-drawer-exp">
                <!-- <img src="/assets/img/Search.png" alt="Search" title="Chercher" style="width:2.3rem"> -->


                <!-- <i class="material-icons">search</i> -->
              </label>

              <div class="mdl-textfield__expandable-holder">
                <input class="mdl-textfield__input" type="text" name="sample"
                      id="fixed-header-drawer-exp">
              </div>
            </div>
          </div>
        </header>

        <!-- <div class="mdl-layout__drawer">
          <span class="mdl-layout-title">Liste</span>
          <nav class="mdl-navigation">
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
            <a class="mdl-navigation__link" href="">Link</a>
          </nav>
        </div> -->

        <main style="height:1000px" class="mdl-layout__content">
          <main>
            <div class="page-content">