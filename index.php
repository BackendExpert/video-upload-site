<?php include("lib/layouts/header.php"); ?>
<link rel="stylesheet" href="css/style.css">
<?php include("lib/layouts/nav.php"); ?>

    <div class="container">
        <h2 class="site-title">Welcome to Site</h2>
        <hr>

        <div class="row">
            <div class="card">
                <div class="search-filter">
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="text" name="search" id="" placeholder="Search" class="form-control" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="lenvid">Video Length</label>
                                <select name="vid-len" id="" class="form-control">
                                    <option value="les10">1 min - 10 min</option>
                                    <option value="10to20">11 min - 20 min</option>
                                    <option value="20up">20 min+</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="queltyvid">Video Quality</label>
                                <select name="vid-qualty" id="" class="form-control">
                                    <option value="360p">360p</option>
                                    <option value="480p">480p</option>
                                    <option value="720p">720p</option>
                                    <option value="1080p">1080p</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="submit" value="Search" name="search_vid" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>


<script src="js/script.js"></script>