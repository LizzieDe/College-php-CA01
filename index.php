<!DOCTYPE html>
<?php
        $filter=$_POST['allGenres'];
        ?>
<html lang="en-uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Liz Doran Burke">
    <meta name="discription" content="This is part of a Media Systems web space where users can view a list of music artists, their Genres and some information about the artist.">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Beats Central</title>
        <title>Example</title>
</head>

<body>

    <div class="titleHeader">
        <h1>Beats Central</h1>
    </div>
    <div class="titleText">
        <p>Here you can filter artists by Genre</p>
    </div>
    <!--First part of 'form'-->
    <form method="POST" action="index.php">
        <!--Genre Drop Down Menu Section-->
        <div class="dropdown">
            <label for="allGenres">Select a Genre:</label><br>
            <select name="allGenres" id="allGenres">
                <option value="">All Music</option>
                <?php
            $allGenres=glob('*',GLOB_ONLYDIR);    
            for ($i=0;$i<count($allGenres);$i++){
            echo '<option ';
            echo 'value="'.$allGenres[$i].'"';
                if($allGenres[$i]==$filter){
                echo ' selected';
            }
            echo '>'.$allGenres[$i].'</option>';
            echo PHP_EOL;
            }
            ?>
               <!--Filter button for drop down menu-->
                <input type="submit" id="allGenres" value="Filter">
            </select>
        </div>
    </form>
    <!--Second part of 'form'-->
    <form method="POST" action="index.php">
        <div class="allGenres">
            <?php
            /*$allGenres is the box with ALL Genre folders Blues, Rock etc inside it*/
            $allGenres=glob('*',GLOB_ONLYDIR);
            /*This section is the title of the Genre folders*/
            for($i=0;$i<count($allGenres);$i++){
                echo '<div class="selectedGenre">';
                if($allGenres[$i]==$filter||$filter==''){
                echo '<h2>'.$allGenres[$i].'</h2>';
                            
            /*$selectedGenre is the box with ONE of the Genre folders inside it ($allGenres but $i selects ONE of them)*/
                $selectedGenre=glob($allGenres[$i].'/*.png');
                
                for($j=0;$j<count($selectedGenre);$j++){
                    echo '<div class="selectedArtist">';
                    /*This section is the artists name and image within the Genre folders*/        
                    $strippedArtist= basename($selectedGenre[$j],'.png');
                    echo '<h3>'.ucwords(str_replace('-',' ',$strippedArtist)).'</h3>';
                    echo '<img src="'.$selectedGenre[$j].'" width="200px" height="auto">';
                    echo '<label for="selectedArtist"></label>';
                    echo '<input type="radio" value="'.$selectedGenre[$j].'" name="selectedArtist">';
                    echo '<button type="submit" value="Submit" formaction="ca1-result.php">More Info</button>';
                    echo '</div>';
                }
                }
               echo '</div>'; 
            echo PHP_EOL;
                        }   
            ?>

        </div>
    </form>
</body>

</html>
