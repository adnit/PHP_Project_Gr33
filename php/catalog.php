<?php
        include 'connect.php';
        function search($category,$con){
            $category = htmlspecialchars($category);
            $get_query = $con -> prepare('Select emri,Poster,ImdbId,Plot from movies where zhanri Like concat("%",:category,"%") order by createdat desc Limit 10');
            $get_query -> execute(array('category' => $category));
            echo '<div><div class="row" data-masonry='.'{"percentPosition":true}'.'>';
            while($movie = $get_query ->fetch(PDO::FETCH_ASSOC)){
                echo '<div class"col-sm-6 col-lg-4 mb-4"><div class="card"><picture type="" srcset=""><img class="card-img-top p-3" src="'.$movie["Poster"].'" onclick="setMovieID("'.$movie["ImdbId"].'")" style="border-radius:24px; object-fit:cover;"></picture><div class="card-body"><h5 class="card-title">'.$movie["emri"].'<br></h5></div></div></div>';
            }
            echo '</div></div>';
        }
        search($_GET['txt'],$con);
        ?>