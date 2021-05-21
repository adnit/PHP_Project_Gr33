<?php
        include 'connect.php';
        function search($text,$con){
            $text = htmlspecialchars($text);
            $get_query = $con -> prepare('Select * from movies where emri Like concat("%",:emri,"%") Limit 5');
            $get_query -> execute(array('emri' => $text));
            while($movie = $get_query ->fetch(PDO::FETCH_ASSOC)){
                echo '<tr><td><a href="EditMovie.php?'.$movie["MovieId"].'"><img class="rounded-circle me-2" width="30" height="30" src="'.$movie["Poster"].'">'.$movie["Emri"].'<br></a></td><td>'.$movie["Studio"] .'</td>
            <td>'.$movie['Viti'] .'</td></tr>';
            }
        }
        search($_GET['txt'],$con);
        ?>