<?php
session_start();
?>

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
        $talent1 = $talentInfo[0]["fName"];
        $talent1Description = $talentInfo[0]["descriptions"];
        $talent1speciality1 = $talentInfo[0]["speciality_1"];
        $talent1speciality2 = $talentInfo[0]["speciality_2"];
        $talent1speciality3 = $talentInfo[0]["speciality_3"];
        $talent1Photo = $talentInfo[0]["photo1"];

        $talent2 = $talentInfo[1]["fName"];
        $talent2Description = $talentInfo[1]["descriptions"];
        $talent2speciality1 = $talentInfo[1]["speciality_1"];
        $talent2speciality2 = $talentInfo[1]["speciality_2"];
        $talent2speciality3 = $talentInfo[1]["speciality_3"];
        $talent2Photo = $talentInfo[1]["photo1"];

        $talent3 = $talentInfo[2]["fName"];
        $talent3Description = $talentInfo[2]["descriptions"];
        $talent3speciality1 = $talentInfo[2]["speciality_1"];
        $talent3speciality2 = $talentInfo[2]["speciality_2"];
        $talent3speciality3 = $talentInfo[2]["speciality_3"];
        $talent3Photo = $talentInfo[2]["photo1"];
    } catch (Exception $ex) {
        echo $ex;
    }
}
    ?>

        <div id="container">
            <?php include("header.php")?>
            <! horizontal box including image and description>
            <div id="talent">
                <img class="picture1" src="<?php echo $talent1Photo;?>" alt="talent picture">
                <! Grey box for the info about the talent>
                <div class="information1">
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
                        <form id = "id_talent1" action="li-profile-visitor.php" method="post">
                            <input class="buttonText" type="hidden" name="talent" value="<?php echo $talent1;?>">
                            <div>

                                <input form="id_talent1" class="buttonText" type="submit" value="Find out more">

                            </div>
                        </form>


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
                        <form id = "id_talent2" action="li-profile-visitor.php" method="post">
                            <input class="buttonText" type="hidden" name="talent" value="<?php echo $talent2;?>">
                            <div>
                                <input class="buttonText" type="submit" form="id_talent2" value="Find out more">
                            </div>
                        </form>

                     </div>
                </div>
                <img class="picture2" src= "<?php echo $talent2Photo ?>" alt= "talent picture">
            </div>
            <! horizontal box including image and description>
            <div id="talent">
                <img class="picture3" src="<?php echo $talent3Photo ?>" alt="talent picture">
                <! Grey box for the info about the talent>
                <div class="information3">
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
                        <form id = "id_talent3" action="li-profile-visitor.php" method="post">
                            <input class="buttonText" type="hidden" name="talent" value="<?php echo $talent3;?>">
                            <div class="button">
                                <input class="buttonText" type="submit" form="id_talent3" value="Find out more">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    <?php include("footer.php")?>
    </body>
</html>