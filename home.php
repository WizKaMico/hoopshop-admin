<?php include('connection/HomeController.php'); ?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HOOPSHOP MARKET PHILIPPINES : HOME</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Hossein Donyadideh">
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/css/uikit.min.css'>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style/home-style.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php
        if (!empty($_GET['message'])) {
            if ($_GET['message'] == 'success') {
                echo '
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "success",
                            title: "Succesful",
                            text: "Operation completed successfully."
                        });
                    });
                </script>';
            }else{
                echo '
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            icon: "error",
                            title: "Error!",
                            text: "Operation failed."
                        });
                    });
                </script>';

            }
        }
        ?>
</head>
<body>
<!-- partial:index.partial.html -->
<nav class="uk-navbar-container uk-light" uk-navbar>
    <div class="uk-navbar-left">
        <a class="uk-navbar-toggle uk-visible@m" uk-navbar-toggle-icon
            uk-toggle="target: .toggle-animation-queued; animation: uk-animation-slide-left-small"></a>
        <a class="uk-navbar-toggle uk-hidden@m" uk-navbar-toggle-icon href="#offcanvas" uk-toggle></a>
        <div class="uk-navbar-item uk-visible@m">
            <img src="logo/logo.png" style="display: block; float:left; margin-left:-220px; width:50%;"/>
        </div>
    </div>
    <div class="uk-navbar-right">

    </div>
</nav>
<div id="offcanvas" uk-offcanvas="overlay: true">
    <div class="uk-offcanvas-bar uk-flex uk-flex-column">
        <button class="uk-offcanvas-close" type="button" uk-close></button>
        <img src="logo/logo.png" style="display: block; margin: 0 auto; width:50%;"/>
        <ul class="tm-menu uk-nav-default uk-nav-parent-icon" uk-nav>
            <li class="uk-active">
                <a><span class="uk-margin-small-right" uk-icon="home"></span>dashboard</a>
            </li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent">
                <a><span class="uk-margin-small-right" uk-icon="file-text"></span>blog</a>
                <ul class="uk-nav-sub">
                    <li>
                        <a><span class="uk-margin-small-right" uk-icon="file-text"></span>post</a>
                    </li>
                    <li>
                        <a><span class="uk-margin-small-right" uk-icon="folder"></span>category</a>
                    </li>
                    <li>
                        <a><span class="uk-margin-small-right" uk-icon="comments"></span>comments</a>
                    </li>
                </ul>
            </li>
            <li class="uk-nav-divider"></li>
            <li>
                <a><span class="uk-margin-small-right" uk-icon="image"></span>images</a>
            </li>
            <li class="uk-nav-divider"></li>
            <li>
                <a><span class="uk-margin-small-right" uk-icon="file"></span>pages</a>
            </li>
            <li class="uk-nav-divider"></li>
            <li>
                <a><span class="uk-margin-small-right" uk-icon="cog"></span>settings</a>
            </li>
        </ul>
    </div>
</div>
<div class="uk-grid-match uk-grid-collapse" uk-height-viewport="expand: true" uk-grid>
    <div
        class="uk-width-auto@m toggle-animation-queued tm-sidebar uk-background-secondary uk-light uk-padding-small uk-visible@m">
        <ul class="tm-menu uk-nav-default uk-nav-parent-icon" uk-nav>
            <li class="uk-active">
                <a><span class="uk-margin-small-right" uk-icon="home"></span>dashboard</a>
            </li>
            <li class="uk-nav-divider"></li>
            <li class="uk-parent">
                <a><span class="uk-margin-small-right" uk-icon="file-text"></span>blog</a>
                <ul class="uk-nav-sub">
                    <li>
                        <a><span class="uk-margin-small-right" uk-icon="file-text"></span>post</a>
                    </li>
                    <li>
                        <a><span class="uk-margin-small-right" uk-icon="folder"></span>category</a>
                    </li>
                    <li>
                        <a><span class="uk-margin-small-right" uk-icon="comments"></span>comments</a>
                    </li>
                </ul>
            </li>
            <li class="uk-nav-divider"></li>
            <li>
                <a><span class="uk-margin-small-right" uk-icon="image"></span>images</a>
            </li>
            <li class="uk-nav-divider"></li>
            <li>
                <a><span class="uk-margin-small-right" uk-icon="file"></span>pages</a>
            </li>
            <li class="uk-nav-divider"></li>
            <li>
                <a><span class="uk-margin-small-right" uk-icon="cog"></span>settings</a>
            </li>
        </ul>
    </div>
    <div class="uk-width-expand@m uk-background-muted">
        <div class="uk-container uk-container-expand uk-margin-large-top uk-margin-bottom">
            <div class="uk-grid uk-grid-medium uk-grid-match" uk-grid>
                
             <?php if(!empty($_GET['view'])){ ?>   
             <?php if($_GET['view'] == 'HOME'){?>
             <?php include('route/home.php'); ?>  
             <?php } else if($_GET['view'] == 'DETAILS'){?>
             <?php include('route/details.php'); ?>
             <?php } else { ?>
             <?php include('route/home.php'); ?>   
             <?php } ?>
             <?php } else { ?>
             <?php include('route/home.php'); ?>
             <?php } ?>

            </div>
            <div class="uk-text-center uk-margin-top">
                <small>MADE  WITH <span uk-icon="icon: heart; ratio: 0.7"></span> BY <a class="uk-link-text"
                        href="#" target="_blank">REVCORE IT SOLUTION</a>.</small>
            </div>
        </div>
    </div>
</div>
<!-- partial -->
<script src='https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit-icons.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js'></script><script  src="./script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<?php if(!empty($_GET['view'])){ ?>   
<?php if($_GET['view'] == 'HOME'){?>
<script src="script/home/home-datatable.js"></script>
<script src="script/home/home-tab.js"></script>
<?php include 'style/home/home-tab.php'; ?>

<?php } else if($_GET['view'] == 'DETAILS'){?>
<script src="script/details/details-datatable.js"></script>
<script src="script/details/details-tab.js"></script>
<script>

function openProductInfo(evt, productInformation) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(productInformation).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>

<style>

  /* Custom CSS */
  .container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        #example1 {
            border: 1px solid;
            padding: 10px;
            box-shadow: 5px 10px;
            width: 20%;
            min-width: 150px; /* Minimum width to prevent excessive shrinking */
        }

        /* Media query to control layout on smaller screens */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            #example1 {
                width: 100%; /* Set width to 100% for full width on smaller screens */
            }
        }

</style>


<?php include 'style/details/details-tab.php'; ?>
<script src="script/details/details-imageupload.js"></script>

<?php } else { ?>

<script src="script/home/home-datatable.js"></script>
<script src="script/home/home-tab.js"></script>
<?php include 'style/home/home-tab.php'; ?>

<?php } ?>
<?php } else { ?>

<script src="script/home/home-datatable.js"></script>
<script src="script/home/home-tab.js"></script>
<?php include 'style/home/home-tab.php'; ?>

<?php } ?>

</body>
</html>
