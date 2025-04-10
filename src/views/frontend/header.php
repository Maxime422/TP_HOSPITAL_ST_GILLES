<header id="sticky">
  <div id="headerPage" class="container">
    <a href="./index.php" aria-label="Back to Home">
      <img src="./public/assets/logos/logo-128.png" width="32" alt="Saint Gilles Hospital Logo - Home" />
    </a>
    <nav>
      <ul>
      <li><a href="./index.php?action=patientsList">Patients List</a></li>
        <li><a href="./index.php?action=rdvList">Appointments List</a></li>
      </ul>
    </nav>

    <div class="ctaContainer">
      <button id="darkLightMode" aria-label="Switch between light and dark mode">
        <i class="fa-solid fa-moon" aria-hidden="true"></i>
      </button>
      <a class="cta secondaryButton" title="Add a New Patient" href="./index.php?action=addPatient">Add Patient</a>
      <a class="cta primaryButton" title="Add a New Appointment" href="./index.php?action=addRdv">Add Appointment</a>
    </div>
  </div>
</header>
