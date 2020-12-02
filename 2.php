
<?php

$all_music = file_get_contents("https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json");

$musics = json_decode($all_music, true);

$musics = $musics['tracks']['items'];

if(isset($_GET['search'])) {
    $tmp_music = [];
    $keyword = strtolower($_GET['search']);
    foreach($musics as $music) {
        if(strpos(strtolower($music['name']), $keyword) !== false ||
        strpos(strtolower($music['artists'][0]['name']), $keyword) !== false) {
            array_push($tmp_music, $music);
        }
    }
    $musics = $tmp_music;
}

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
        <div class="row mt-5"> <!-- แถวของช่องค้นหา -->
            <div class="col">
                <h5>
                    ระบุคำค้นหา
                </h5>
                <form method="get">
                    <div class="row">
                        <div class="col-10">
                            <input type="text" class="form-control" name="search">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-primary btn-block" type="submit">
                                ส่ง
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row my-4">
            <div class="col text-center">
                <?php
                if(count($musics) == 0) {
                    ?>
                        <b>
                            ไม่พบผลการค้นหา
                        </b>
                    <?php
                }
                else if(isset($_GET['search'])) {
                    echo "<b>ผลการค้นหาทั้งหมด ". count($musics) ." รายการ</b>";
                }
                ?>
            </div>
        </div>
        <div class="row"> <!-- แถวของรายการเพลง -->
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