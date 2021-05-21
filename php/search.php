<?php
        include 'connect.php';
        function search($text,$con){
            $text = htmlspecialchars($text);
            $get_query = $con -> prepare('Select emri,Poster,ImdbId,Viti from movies where emri Like concat("%",:emri,"%") Limit 5');
            $get_query -> execute(array('emri' => $text));
            while($movie = $get_query ->fetch(PDO::FETCH_ASSOC)){
                $test = $movie["emri"]." ". $movie["Viti"];
                $test = str_replace(" ","-",$test);
                echo '<a href="movie.php?'.$test.'")>'.'<img src="'.$movie["Poster"].'">'.'<div class="mvtitle">'.$movie["emri"].'</div></a>';
            }
        }
        search($_GET['txt'],$con);
        ?>