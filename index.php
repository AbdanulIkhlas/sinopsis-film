<?php
    session_start();
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film Explainer</title>
    <link rel="stylesheet" href="assets/style/index.css">
</head>

<body>
    <header>
        <section>
            <img src="assets/image/logo.png" alt="Logo">
        </section>
        <nav>
            <ul class="ul-navbar">
                <li class="li-navbar"><a href="index.html">HOME</a></li>
                <li class="li-navbar">
                    GENRE
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </span>
                    <ul class="dropdown">
                        <!-- ikhsan : database genre -->
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM navbar_genre");
                            while($data = mysqli_fetch_array($query)){
                        ?>
                            <li><a href=""> <?php echo $data['genre']; ?> </a></li>
                            
                        <?php } ?>
                    </ul>

                
                </li>
                <li class="li-navbar">
                    NEGARA
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </span>
                    <ul class="dropdown">
                        <!-- ikhsan : database negara -->
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM navbar_negara");
                            while($data = mysqli_fetch_array($query)){
                        ?>
                            <li><a href=""> <?php echo $data['negara']; ?> </a></li>
                            
                        <?php } ?>
                    </ul>
                </li>
                <li class="li-navbar">
                    TAHUN
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
                    </span>
                    <ul class="dropdown">
                        <!-- ikhsan : database tahun -->
                        <?php
                            $query = mysqli_query($conn, "SELECT * FROM navbar_tahun");
                            while($data = mysqli_fetch_array($query)){
                        ?>
                            <li><a href=""> <?php echo $data['tahun']; ?> </a></li>
                            
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <section>

                <!-- ikhsan : searching by judul -->
                <form action="searching.php" method="POST">
                    <div class="searching">
                        <button class="search-icon" type="submit" name="cari">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                        <input type="text" placeholder="Search" name="cari_judul">
                    </div>
                </form>  

                <a href="halamanLogin.php">
                    <div class="login">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        </svg>
                    </div>
                </a>
            </section>
        </nav>
    </header>
    <main>
        <article>
            <!-- Bagian Tren Sekarang -->
            <section>
                <h1>TREN SEKARANG</h1>
                <div class="all-cards">
                    
                    <!-- ikhsan : database konten -->
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM konten");
                        while($data = mysqli_fetch_array($query)){
                    ?>

                    <div class="container-card">
                        <div class="card">
                            <a href=halamanSinopsis.php?id=<?php echo $data['id']; ?>>
                                <div class="info">
                                    <div class="negara"> <?php echo $data['negara'] ?> </div>
                                    <div class="tahun"> <?php echo $data['tahun'] ?> </div>
                                </div>
                                <img id="gambar" src="<?php echo "assets/image/".$data['gambar']; ?>"" alt="">
                                <div class="genre"> <?php echo $data['genre'] ?> </div>
                            </a>
                        </div>
                        <label for="gambar"> <?php echo $data['judul'] ?> </label>
                    </div>

                    <?php } ?>

                </div>
            </section>
            <!-- end : Bagian Tren Sekarang -->

            <!-- Bagian LAIN (ambil dari database atau static juga boleh)-->
            <section>
                <h1>BAGIAN LAIN</h1>
                <div class="all-cards">
                    <!-- xxxx adalah yang di isi (di ambil dari database) -->
                    <div class="container-card">
                        <div class="card">
                            <a href="halamanSinopsis.php?id=xxxxx">
                                <div class="info">
                                    <div class="negara">xxxx</div>
                                    <div class="tahun">xxxx</div>
                                </div>
                                <!-- format :  width: 160px , height: 195px;-->
                                <img id="gambar" src="xxx" alt="xxx">
                                <div class="genre">xxxxxx</div>
                            </a>
                        </div>
                        <label for="gambar">xxxx</label>
                    </div>
                </div>
            </section>
            <!-- end : Bagian LAIN-->

            <!-- Bagian LAIN2 (ambil dari database atau static juga boleh)-->
            <section>
                <h1>BAGIAN LAIN 2</h1>
                <div class="all-cards">
                    <!-- xxxx adalah yang di isi (di ambil dari database) -->
                    <div class="container-card">
                        <div class="card">
                            <a href="halamanSinopsis.php?id=xxxxx">
                                <div class="info">
                                    <div class="negara">xxxx</div>
                                    <div class="tahun">xxxx</div>
                                </div>
                                <!-- format :  width: 160px , height: 195px;-->
                                <img id="gambar" src="xxx" alt="xxx">
                                <div class="genre">xxxxxx</div>
                            </a>
                        </div>
                        <label for="gambar">xxxx</label>
                    </div>
                </div>
            </section>
            <!-- end : Bagian LAIN2-->
        </article>
    </main>
    <footer></footer>
    <script src="assets/script/index.js"></script>
</body>

</html>