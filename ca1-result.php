<!--User has choosen 'RADIO BUTTON' of selected artists and clicked Submit, therefore user will now see artists name, image, bio and soundclip for one of three of each genre-->
<!DOCTYPE html>
<?php
$selectedArtist=$_POST["selectedArtist"];
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style1.css">
    <title>Artist Page</title>
</head>

<body>
    <div class=artistName>
        <?php
        $nameArtist=basename($selectedArtist,'.png');
        echo '<h2>'.ucwords(str_replace('-',' ',$nameArtist)).'</h2>';
        ?>
    </div>
    <div class=artistImage>
        <?php
        echo '<img src="'.$selectedArtist.'" width="400px" height="auto">';
        ?>
    </div>
    <div class=artistSound>
        <?php
        $soundDir=dirname("$selectedArtist");
        $soundBase=basename("$nameArtist.mp3");
        $soundFull=("$soundDir/$soundBase");
        if (file_exists($soundFull)){
        echo '<audio controls>';
        echo '<source src="'.$soundFull.'" type="audio/mpeg">';
        echo '</audio>';
        } else {
            echo "Sorry, no Sound Clip found for ".ucwords(str_replace('-',' ',$nameArtist))."";
        }
        ?>
    </div>
    <div class=artistBio>
        <?php
        $bioTextDir=dirname("$selectedArtist");
        $bioTextBase=basename("$nameArtist.txt");
        $bioTextFull=("$bioTextDir/$bioTextBase");
        if (file_exists($bioTextFull)){
        echo file_get_contents($bioTextFull);
        } else {
            echo "Sorry, no Bio Information found for ".ucwords(str_replace('-',' ',$nameArtist))."";
        }
        ?>
    </div>
    <button type="submit" value="submit" formaction="index.php">Home</button>
</body>

</html>
