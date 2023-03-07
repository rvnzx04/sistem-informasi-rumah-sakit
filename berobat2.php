<?php
include 'config.php';
$active = 'berobat';
$date = date('y/m/d');
date_default_timezone_set("Asia/Jakarta");



?>

<?php include('navbar.php'); ?>

<div class="container-fluid">
    <h1 class="text-center text-black">Cari Pasien</h1>
    <h2 class=" pb-4 border-bottom"></h2>

    <?php if (isset($_SESSION['eksekusi'])) :
    ?>

        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;"><i class="bi bi-check2"></i>
            <a><?php echo $_SESSION['eksekusi']; ?></a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['eksekusi']);
    endif;

    ?>
    <?php if (isset($_SESSION['tampil'])) :
    ?>

        <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert" style="margin-left:20px ; margin-right:20px ;"><i class="bi bi-check2"></i>
            <a><?php echo $_SESSION['tampil']; ?></a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php
        unset($_SESSION['tampil']);
    endif;

    ?>
    <div class="row">

        <div class="col-md-12">
            <label for="form" class="fs-4" style="color: black;"> Masukan Nik</label>
            <input type="text" name="" id="gsearchsimple" class="form-control input-lg" placeholder="Search...">
            <ul class="list-group">
            </ul>
            <div id="localSearchSimple"></div>
            <div id="detail" style="margin-top:16px;"></div>
        </div>
        <div class="col-md-12"></div>
    </div>

    <script src="JsLocalSearch.js"></script>

    <script>
        $(document).ready(function() {
            $('#gsearchsimple').keyup(function() {
                var query = $('#gsearchsimple').val();
                $('#detail').html('');
                $('.list-group').css('display', 'block');
                if (query.length == 2) {
                    $.ajax({
                        url: "fetch_online.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $('.list-group').html(data);
                        }
                    })
                }
                if (query.length == 0) {
                    $('.list-group').css('display', 'none');
                }
            });

            $('#localSearchSimple').jsLocalSearch({
                action: "Show",
                html_search: true,
                mark_text: "marktext"
            });

            $(document).on('click', '.gsearch', function() {
                var nik = $(this).text();
                $('#gsearchsimple').val(nik);
                $('.list-group').css('display', 'none');
                $.ajax({
                    url: "fetch_online.php",
                    method: "POST",
                    data: {
                        nik: nik
                    },
                    success: function(data) {
                        $('#detail').html(data);
                    }
                })
            });
        });
    </script>