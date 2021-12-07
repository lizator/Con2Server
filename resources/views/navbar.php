
<?php
  // fails when there is no 'routes'
  if (!isset($routes)) {
    exit ('<h1>Unable to load Activities!</h1>');
  }

?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <a class="navbar-brand" href="/">Con2</a>
  <a class="navbar-descriptor" href="#">Hvor skal vi hen?</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <!-- $page string comes from web.php, matches destination name -->
      <?php if ($page == 'hjem') {echo '<li class="nav-item active">';} else {echo '<li class="nav-item">';} ?>
        <a class="nav-link" href="/">Hjem!</a>
      </li>

      <?php if ($page == 'aktiviteter') {echo '<li class="nav-item dropdown active">';} else {echo '<li class="nav-item dropdown">';} ?>
        <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Aktiviteter!
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <?php // this snippet creates the activities based on the $routes created in web.php
            foreach($routes as $route => $title) {
              echo '<a class="dropdown-item" href="/aktiviteter/' . $route . '">' . $title . '</a>';
            }
           ?>

          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/om_aktiviteter">Om aktiviteter...</a>

        </div>
      </li>
      <?php if ($page == 'praktisk') {echo '<li class="nav-item active">';} else {echo '<li class="nav-item">';} ?>
        <a class="nav-link" href="/praktisk">Praktisk!</a>
      </li>
      <?php if ($page == 'tilmeld') {echo '<li class="nav-item active">';} else {echo '<li class="nav-item">';} ?>
        <!--<a class="nav-link disabled" href="#">Tilmeld!</a>--> <!-- disabled version -->
        <a class="nav-link" href="/tilmeld">Tilmeld!</a> <!-- enabled version -->
      </li>
      <?php if ($page == 'betaling') {echo '<li class="nav-item active">';} else {echo '<li class="nav-item">';} ?>
        <a class="nav-link" href="/betaling">Betaling!</a> <!-- enabled version -->
      </li>
    </ul>
    <!--
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    -->
  </div>
</nav>
