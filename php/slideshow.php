<?php
                        include 'connect.php';
                        $get_movie = $con -> prepare('Select Poster,ImdbId from movies where Slideshow is True order by createdat desc Limit 3');
                        $get_movie -> execute();
                        $firstRow = $get_movie -> fetch(PDO::FETCH_ASSOC);
                        echo '<div class="carousel-item active" style="height: 100%"> <img class="w-100 d-block" src="'.$firstRow["Poster"].'"onclick="setMovieId("'.$firstRow["ImdbId"].'")'.
                        'alt="Slide Image" style="height: 100%"> </div>';
                        while($movie = $get_movie ->fetch(PDO::FETCH_ASSOC)){
                            echo '<div class="carousel-item" style="height: 100%"> <img class="w-100 d-block" src="'.$movie["Poster"].'"onclick="setMovieId("'.$movie["ImdbId"].'")'.
                            'alt="Slide Image" style="height: 100%"> </div>';
                        }
                        ?>