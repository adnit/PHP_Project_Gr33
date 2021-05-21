<?php
        include 'connect.php';
        function search($con){
            $query = $con -> prepare('Select * from movies order by createdat desc');
            $query -> execute();
            while($movie = $query ->fetch(PDO::FETCH_ASSOC)){
            echo '<tr><td><a href="EditMovie.php?'.$movie["MovieId"].'"><img class="rounded-circle me-2" width="30" height="30" src="'.$movie["Poster"].'">'.$movie["Emri"].'<br></a></td><td>'.$movie["Studio"] .'</td>
            <td>'.$movie['Viti'] .'</td></tr>';
        }
        }
        search($con);
        ?>