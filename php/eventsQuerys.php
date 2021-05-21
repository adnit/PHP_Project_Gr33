<?php 
    include 'connect.php';


    try{
        
        function eventiAktual($con){
        
        $eventitash = $con->prepare("SELECT EventName, EventText, EventImg FROM Evente WHERE Year(EventStart) = Year(NOW()) AND MONTH(EventStart) = Month(Now()) 
        AND Day(EventStart) = Day(Now()) Limit 1");
        $eventitash->execute();
        while($eventi = $eventitash -> fetch(PDO::FETCH_ASSOC)){
            echo '<div class="card-body" style="object-fit: contain;">
                    <section class="article-clean">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                                    <div class="intro">
                                    <h1 class="text-center">'.$eventi["EventName"].'</h1>
                                    <p class="text-center"><span class="date">'.date('M jS Y').'</span></p>
                                    <img class="img-fluid" style="position: center; width: 100%" src='.$eventi["EventImg"].' />
                                    </div>
                                    <div class="text" style="text-align: center;">
                                        <p>'.$eventi["EventText"].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>';
            }
        }

        function eventetEArdhshme($con){
             $teardhshme = $con->prepare("SELECT EventName, EventText, EventImg, EventStart FROM Evente WHERE 
             (Year(EventStart) > Year(NOW()))
             OR (Year(EventStart) = Year(NOW()) AND MONTH(EventStart) > Month(Now())) 
             OR (Year(EventStart) = Year(NOW()) AND MONTH(EventStart) = Month(Now()) 
             AND Day(EventStart) > Day(Now()))");
             $teardhshme->execute();

             while($eventi = $teardhshme -> fetch(PDO::FETCH_ASSOC)){
                 $date = $eventi["EventStart"];
                 $month = date('M', strtotime($date));
                 $day = date('d', strtotime($date));
                echo '

                <div class="col-md-4 on-hover">
                    <div class="card border-0 mb-4">
                        <a href="#"><img class="card-img-top" src="'.$eventi["EventImg"].'" alt="wrappixel kit" style = "height:13rem; object-fit:cover;" /></a>
                        <div class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">'.$month.'<span class="d-block">'.$day.'</span></div>
                        <h5 class="font-weight-medium mt-3">'.$eventi["EventName"].'</h5>
                        <p class="mt-3">'.$eventi["EventText"].'</p>
                        </div>
                </div>
                ';
             }
             
        }

        function gjithsejEvente($con){
            $gjithsej = $con->prepare("SELECT COUNT(*) AS gjithsej FROM Evente");
            $gjithsej->execute();
            $result = $gjithsej -> fetch(PDO::FETCH_ASSOC);
            echo '<div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Evente Gjithsej</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>'.$result["gjithsej"].'</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>';
            
        }

        function perdoruesit($con){
            $perdorues = $con->prepare("SELECT COUNT(UserId) AS aktive FROM USERS");
            $perdorues->execute();
            $result = $perdorues -> fetch(PDO::FETCH_ASSOC);
            echo '<div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Perdorues aktiv</span></div>
                            <div class="row g-0 align-items-center">
                                <div class="col-auto">
                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span>'.$result["aktive"].'</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>';

        }

        function tani($con){
            $tani = $con->prepare("SELECT COUNT(*) AS tash FROM Evente WHERE Year(EventStart) = Year(NOW()) AND MONTH(EventStart) = Month(Now()) 
            AND Day(EventStart) = Day(Now()) Limit 1 ");
            $tani->execute();
            $result = $tani -> fetch(PDO::FETCH_ASSOC);
            echo '<div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Eventet Tani</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span>'.$result["tash"].'</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-calendar fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>';
        }

        
    }
    catch(PDOExcpetion $e){
        echo $sql . "<br>" . $e->getMessage();
    }





?>