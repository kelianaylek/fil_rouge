<header>
    <nav>
        <div>
            <a href="?page=home">Logo</a>
        </div>
        <div>
            <!-- <a href="?page=shopping"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></a> -->
            <a href="?page=friends"><i class="fa fa-users fa-lg" aria-hidden="true"></i></a>
            <a href="">
                <p><?php echo($_SESSION['user_score']) ?></p><i class="fa fa-star fa-lg" aria-hidden="true"></i>
            </a>
            <a href="?page=profil"><?php echo($_SESSION['user_name']) ?></a>
            <a href="?page=profil"><i class="fa fa-user-circle-o fa-lg" aria-hidden="true"></i></a>
        </div>
    </nav>
</header>