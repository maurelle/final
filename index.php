<?php
$all_music = file_get_contents("https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json");
$musics = json_decode($all_music, true);
$musics = $musics['tracks']['items'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRE-FINAL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <?php
            foreach($musics as $music) {
                ?>
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <img class="card-img-top" src="<?php echo $music['album']['images'][0]['url'] ?>" alt="">
                        <div class="card-body">
                            <h5>
                                <?php echo $music['name'] ?>
                            </h5>
                            <p>
                                Artist : <?php echo $music['artists'][0]['name'] ?>
                            </p>
                            <p>
                                Release date : <?php echo $music['album']['release_date'] ?>
                            </p>
                            <p>
                                Available : <?php echo count($music['available_markets']) ?> countries
                            </p>
                        </div>
                    </div>
                </div>
                
                <?php
            }
            ?>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>
