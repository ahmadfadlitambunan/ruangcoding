<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="index.html" class="logo">
            <img src="/images/logo5.png" alt="Chain App Dev">
          </a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <!-- searching -->
          <ul class="nav">
            @auth
            <div class="inner-form">
              <div class="input-field">
                <form action="/search" method="GET">
                  <div class="input-group">
                    <input type="text" class="search form-control" placeholder="Mau belajar apa hari ini?"
                      name="search">
                    <button class="button" type="submit">Cari</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- header -->
            <li class="scroll-to-section"><a href="index.html" class="active">Home</a></li>
            </li>
            <li class="scroll-to-section dropdown">
              <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Kelas
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">HTML CSS</a></li>
                <li><a class="dropdown-item" href="#">PHP</a></li>
                <li><a class="dropdown-item" href="#">Mysql</a></li>
              </ul>
            </li>
            <li class="scroll-to-section dropdown">
              <a class="dropdown-toggle" href="#" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                Halo, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li>
                  <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</a>
                  </form>
                </li>
              </ul>
            </li>
            @else
            <li>
              <div class="gradient-button"><a id="modal_trigger" href="/login"><i class="fa fa-sign-in-alt"></i>
                  Masuk</a></div>
            </li>
            @endauth
          </ul>
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>