<?php
        include 'connect.php';
        function search($text,$con){
            $text = htmlspecialchars($text);
            $get_query = $con -> prepare('Select emri,Poster,ImdbId from movies where emri Like concat("%",:emri,"%") Limit 5');
            $get_query -> execute(array('emri' => $text));
            while($movie = $get_query ->fetch(PDO::FETCH_ASSOC)){
                echo '<a onclick="setMovieID("'.$movie["ImdbId"].'")>'.'<img src="'.$movie["Poster"].'">'.'<div class="mvtitle">'.$movie["emri"].'</div></a>';
            }
        }
        search($_GET['txt'],$con);
        ?>