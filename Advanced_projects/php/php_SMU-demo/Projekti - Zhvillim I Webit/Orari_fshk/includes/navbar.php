<nav class="navbar">
    <img src="includes/imazhet/upz.png">
        <ul class="main-nav">
            <li>
              <a href="home.php">Home</a>
              <?php
              if(!isset($_SESSION['usernameID'])) {
                  echo '<a href="register.php">Regjistrohu</a>
                        <a href="login.php">Kyçu</a>';
              }

              if(isset($_SESSION['usernameID'])) {
                if(isset($_SESSION['roli'])) {
                  if($_SESSION['roli'] == 3) {
                      echo '<a href="registerSubjects.php">Regjistro Lëndët</a>
                            <a href="scheduleStudent.php">Orari i ligjëratave</a>';
                  }
                  else if ($_SESSION['roli'] == 2) {
                    echo '<a href="mySubjects.php">Lëndët e mia</a>
                          <a href="scheduleOverall.php">Orari i ligjëratave</a>';
                }
                else if ($_SESSION['roli'] == 1) {
                    echo '<a href="addProf.php">Shto Profesorin</a>
                          <a href="profList.php">Lista e  Profesorëve</a>
                          <a href="addSubject.php">Shto Lëndë</a>
                          <a href="subjectList.php">Lista e Lëndëve</a>
                          <a href="scheduleOverall.php">Orari i ligjëratave</a>';
                }
              }

              echo '<a href="includes/logout.php">Dil</a>';

            }?>
            </li>
        </ul>
</nav>