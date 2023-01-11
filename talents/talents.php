<!DOCTYPE html>
<html lang="eng">
    <head>
        <title>Talents</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/talentStyle.css">
    </head>

    <body>
    <?php
        try{
            $dbHandler = new PDO("mysql:host=mysql;dbname=e3t_database;charset=utf8", "root", "qwerty");
        }catch (Exception $ex){
            echo $ex;
        }
        if($dbHandler) {
            try {
                $talentQry = $dbHandler->prepare("SELECT * FROM `talents` ORDER BY 'id'");
                $talentQry->execute();

                $talentInfo = $talentQry->fetchAll(PDO::FETCH_ASSOC);
                $talent1 = $talentInfo[0]["name"];
                $talent1Description = $talentInfo[0]["descriptions"];
                $talent1speciality1 = $talentInfo[0]["speciality_1"];
                $talent1speciality2 = $talentInfo[0]["speciality_2"];
                $talent1speciality3 = $talentInfo[0]["speciality_3"];
                $talent1Photo = $talentInfo[0]["photos"];

                $talent2 = $talentInfo[1]["name"];
                $talent2Description = $talentInfo[1]["descriptions"];
                $talent2speciality1 = $talentInfo[1]["speciality_1"];
                $talent2speciality2 = $talentInfo[1]["speciality_2"];
                $talent2speciality3 = $talentInfo[1]["speciality_3"];
                $talent2Photo = $talentInfo[1]["photos"];

                $talent3 = $talentInfo[2]["name"];
                $talent3Description = $talentInfo[2]["descriptions"];
                $talent3speciality1 = $talentInfo[2]["speciality_1"];
                $talent3speciality2 = $talentInfo[2]["speciality_2"];
                $talent3speciality3 = $talentInfo[2]["speciality_3"];
                $talent3Photo = $talentInfo[2]["photos"];
            } catch (Exception $ex) {
                echo $ex;
            }
        }
    ?>
        <div id="container">
            <! horizontal box including image and description>
            <div id="talent">
                <img class="picture1" src="images/b_3.jpg" alt="talent picture">
                <! Grey box for the info about the talent>
                <div class="information">
                    <div class="description"> <! left column>
                        <h1><?php echo $talent1;?></h1>
                        <p><?php echo $talent1Description;?></p>
                    </div>
                    <div class="specialty"> <! right column>
                        <div>
                            <p>-> <?php echo $talent1speciality1;?></p>
                            <p>-> <?php echo $talent1speciality2;?></p>
                            <p>-> <?php echo $talent1speciality3;?></p>
                        </div>
                        <div class="button">
                            Find out more
                        </div>
                    </div>

                </div>
            </div>
            <! horizontal box including image and description>
            <div id="talent">
                <! different class as margins are different>
                <div class="information2">
                    <div class="description"> <! left column>
                        <h1><?php echo $talent2;?></h1>
                        <p><?php echo $talent2Description;?></p>
                    </div>
                    <div class="specialty"><! right column>
                        <div>
                            <p>-> <?php echo $talent2speciality1;?></p>
                            <p>-> <?php echo $talent2speciality2;?></p>
                            <p>-> <?php echo $talent2speciality3;?></p>
                        </div>
                        <div class="button">
                            Find out more
                        </div>
                    </div>
                </div>
                <img class="picture2" src="images/a_1.jpg" alt="talent picture">
            </div>
            <! horizontal box including image and description>
            <div id="talent">
                <img class="picture3" src="images/c_1.jpg" alt="talent picture">
                <! Grey box for the info about the talent>
                <div class="information">
                    <div class="description"> <! left column>
                        <h1><?php echo $talent3;?></h1>
                        <p><?php echo $talent3Description;?></p>
                    </div>
                    <div class="specialty"> <! right column>
                        <div>
                            <p>-> <?php echo $talent3speciality1;?></p>
                            <p>-> <?php echo $talent3speciality2;?></p>
                            <p>-> <?php echo $talent3speciality3;?></p>
                        </div>
                        <div class="button">
                            Find out more
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>