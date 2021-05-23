<?php
        include 'connect.php';
        function search($con){
            $query = $con -> prepare('Select * from users');
            $query -> execute();
            while($movie = $query ->fetch(PDO::FETCH_ASSOC)){
            echo '<tr><td><a href="#'.$movie["UserId"].'"><img class="rounded-circle me-2" width="30" height="30" src="'.$movie["UserAvatar"].'">'.$movie["Username"].'<br></a></td><td>'.$movie["Email"] .'</td>
            <td>'.$movie['UserType'] .'</td></tr>';
        }
        }
        search($con);
        ?>