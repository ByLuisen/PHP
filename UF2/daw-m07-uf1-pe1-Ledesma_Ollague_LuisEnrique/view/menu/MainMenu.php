<header>
    <nav class="navbar navbar-expand-lg border-bottom border-2 border-black mb-5">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                    <a class="nav-link active" href="home.php?option=category">Categories</a>                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="home.php?option=list_books">Llista de books</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" href="home.php?option=logout">Logout</a>
                    </li>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <li class="nav-item ">
                            <a class="nav-link active">Hola <?php echo $_SESSION['username'] ?> (Rol: <?php echo $_SESSION['rol'] ?>)</a>
                        </li>
                    <?php }; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

