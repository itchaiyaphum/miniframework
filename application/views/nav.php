<header class="border-bottom sticky-top">
      <nav class="navbar bg-light p-0">
        <div class="container justify-content-between justify-sm-content-start">
          <a class="navbar-brand" href="/">
            <img
              height="30"
              src="/assets/img/workflow-logo-indigo-600-mark-gray-800-text.svg"
              alt="Workshop For Beginners"
            />
          </a>
          <!-- start: responsive menu -->
          <button
            class="navbar-toggler m-2 d-sm-none"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#navbarMenu"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div
            class="offcanvas offcanvas-start d-block d-sm-none"
            id="navbarMenu"
          >
            <ul class="list-group">
              <li class="list-group-item">Main</li>
              <li>
                <a class="list-group-item active" href="/"
                  ><i class="bi-house"></i> Home</a
                >
              </li>
              <li>
                <a class="list-group-item" href="/news.php"
                  ><i class="bi-megaphone"></i> News</a
                >
              </li>
              <li>
                <a class="list-group-item" href="/about.php"
                  ><i class="bi-info-circle"></i> About</a
                >
              </li>
              <li>
                <a class="list-group-item" href="/contact.php"
                  ><i class="bi-envelope"></i> Contact</a
                >
              </li>
              <li class="list-group-item">User</li>
              <li>
                <a class="list-group-item" href="/profile.php"
                  ><i class="bi-person-circle"></i> My Profile</a
                >
              </li>
              <li class="list-group-item">Settings</li>
              <li>
                <a class="list-group-item" href="/ettings-profile.php"
                  ><i class="bi-pencil-square"></i> Edit Profile</a
                >
              </li>
              <li>
                <a class="list-group-item" href="/settings-password.php"
                  ><i class="bi-lock"></i> Change Password</a
                >
              </li>
              <li>
                <a
                  class="list-group-item"
                  href="/settings-recentdevices.php"
                  ><i class="bi-phone"></i> Recent Devices</a
                >
              </li>
              <li>
                <a class="list-group-item" href="/logout.php"
                  ><i class="bi-power"></i> Sign out</a
                >
              </li>
            </ul>
          </div>
          <!-- end: responsive menu -->

          <div class="d-none d-sm-flex flex-grow-1">
            <ul class="nav flex-row">
              <li class="nav-item active">
                <a href="/" class="nav-link">Home</a>
              </li>
              <li class="nav-item">
                <a href="/news.php" class="nav-link">News</a>
              </li>
              <li class="nav-item">
                <a href="/about.php" class="nav-link">About</a>
              </li>
              <li class="nav-item">
                <a href="/contact.php" class="nav-link">Contact</a>
              </li>
            </ul>
          </div>

          <div class="dropdown dropstart d-none d-sm-flex">
            <a
              href="#"
              class="d-block link-dark text-decoration-none"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <img
                src="/assets/img/profile.jpeg"
                width="30"
                height="30"
                class="rounded-circle"
              />
              <span
                class="position-absolute translate-middle rounded-circle profile-online"
              ></span>
            </a>
            <ul class="dropdown-menu text-small">
              <li>
                <a class="dropdown-item" href="/ui/3.1.profile.html"
                  ><i class="bi-person-circle"></i> Wannapong Kumjumpon</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="/ui/3.2.settings-profile.html"
                  ><i class="bi-pencil-square"></i> Edit Profile</a
                >
              </li>
              <li>
                <a class="dropdown-item" href="/settings-password.php"
                  ><i class="bi-lock"></i> Change Password</a
                >
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="/settings-recentdevices.php"
                  class="nav-link"
                  ><i class="bi-phone"></i> Recent Devices</a
                >
              </li>
              <li><hr class="dropdown-divider" /></li>
              <li>
                <a class="dropdown-item" href="/logout.php"
                  ><i class="bi-power"></i> Sign out</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>