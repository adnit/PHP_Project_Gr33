<?php
                        include 'connect.php';
                        $get_movie = $con -> prepare('Select Emri,Poster,Viti from movies where Slideshow is True order by createdat desc Limit 3');
                        $get_movie->execute();
                        $firstRow = $get_movie->fetch(PDO::FETCH_ASSOC);
                        $test = $firstRow["Emri"]." ". $firstRow["Viti"];
                        $test = str_replace(" ","-",$test);
                        echo '<div class="carousel-item active" style="height: 100%"><a href="movie.php?'.$test.'"> <img class="w-100 d-block" src="'.$firstRow["Poster"].'")'.
                        'alt="Slide Image" style="height: 100%"> </a></div>';
                        while($movie = $get_movie ->fetch(PDO::FETCH_ASSOC)){
                            $test = $movie["Emri"]." ". $movie["Viti"];
                            $test = str_replace(" ","-",$test);
                            echo '<div class="carousel-item" style="height: 100%"><a href="movie.php?'.$test.'"> <img class="w-100 d-block" src="'.$movie["Poster"].'")'.
                        'alt="Slide Image" style="height: 100%"> </a></div>';
                        }
                        ?>