<nav class="navbar navbar-expand-lg">
        <a class="navbar-brand m-2" href="index.php">PHPCOOK</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Home</a>
            <a class="nav-item nav-link" href="create.php">Create</a>
            <?php
              if(!isset($_SESSION['username'])):
             ?>
                <a class="nav-item nav-link" href="login.php">Login</a>
                <?php else: ?>
                    <a class="nav-item nav-link" href="myaccount.php">My Account</a>
                    <a class="nav-item nav-link" href="logout.php">Logout</a>
              <?php endif ?>
          </div>
        </div>
      </nav>