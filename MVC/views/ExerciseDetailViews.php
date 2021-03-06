<?php
    function currency_format($number, $suffix = '')
    {
        if (!empty($number)) {
            return number_format($number, 0, ',', '.') . "{$suffix}";
        }
    }
    $discount = isset($_SESSION['discount_user']) ? $_SESSION['discount_user'] : -1;
    $arr = mysqli_fetch_array($data["data"]);
    $ID = $arr[0];
    $Image = $arr[1];
    $NameWork = $arr[2];
    $Note = $arr[3];
    $Price = $arr[4];
    $Time = $arr[5];
    $IDDevice = $arr[6];
    $dateBegin = date('m/d/Y');
    $newdate = strtotime('+' . $Time . ' month', strtotime($dateBegin));
    $dateEnd = date('d/m/Y', $newdate);
    $dateBegin = date('d/m/Y');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/Public/teamplate1/CSS/animate.animate.css" rel="stylesheet">
    <link href="/Public/teamplate1/CSS/bootsrap.min.css" rel="stylesheet">
    <link href="/Public/teamplate1/CSS/bootrap-icon.css" rel="stylesheet">
    <link href="/Public/teamplate1/CSS/swiper-bunlder.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Template Main CSS File -->
    <link href="/Public/All/css/style.css" rel="stylesheet">
    <link href="/Public/All/css/styleTuChinh.css" rel="stylesheet">
</head>

<body>

    <div>
        <?php
        include_once "MVC/controllers/Header.php";
        $h = new Header();
        $h->index();
        ?>
    </div>
    <div style="height: 115px;" class="swiper-slide carousel-item-a intro-item bg-image"></div>
    <div id='than'>
        <article>
            <section>
                <div class="phantrentrai">
                    <div class='traiThongtin'>TH??NG TIN V?? TH??I H???N B??I T???P</div>
                    <table>
                        <tr>
                            <td rowspan='6' class='chuaKhungAnh'>
                                <div class='khungAnh'>
                                    <image class='khungAnh' src="/Public/images/AnhBaiTap/<?= $Image ?>"></image>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <lable class="tenBT" id="name" name="name"><?= $NameWork ?></lable><br />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable> Gi?? b??i t???p: </lable>
                                <lable class="price" id="price" style="color: red;"> <?= currency_format($Price); ?> VN??</lable><br />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <lable class="thoihanBT" id="thoihan">Th???i h???n(th??ng): <?= $Time ?></lable>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="btn btn-primary" type='Submit' name='DKBaitap' id="DKBaitap" value="????ng l?? ngay" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            </td>

                        </tr>
                    </table>
                </div>
                <div class="noteWork">
                    <div>
                        <h1>H?????ng d???n b??i t???p</h1>
                    </div>
                    <div class='gachchan'></div>
                    <div class='phantraiNote'>
                        <?= $Note ?>
                    </div>
                </div>
            </section>
            <aside>
                <div>
                    <div class='tieude'>Khuy??n d??ng</div>
                    <div class='gchan'></div>
                    <div class='imGT'>
                        <image src="/Public/images/AnhMasterPage/khuyen_dung.png" style="width:270px;height:400px;"></image>
                    </div>
                    <div class='qctpbs'>Th???c ph???m b??? sung</div>
                    <div class='gchan'></div>
                    <div>
                        <marquee class="qcBenphai" scrollamount="2" direction="up" loop="50" scrolldelay="0" behavior="scroll" onmouseover="this.stop() " onmouseout="this.start()">
                            <?php
                            while ($row2 = mysqli_fetch_array($data["dstp"])) {
                                $sl = $row2[4] - $row2[5]
                            ?>
                                <div class='chigtDSTP'>
                                    <div class='anhTP'>
                                        <image src="/Public/images/AnhSanPham/<?= $row2[1] ?>" style="width:120px;height:95px;"></image>
                                    </div>
                                    <div class='ctTP'>
                                        <label><b><?= $row2[2] ?></b></label><br />
                                        <label>Gi??: <?= currency_format($row2[3]) ?> <u>??</u></label><br />
                                        <label>S??? l?????ng: <?= $sl ?></label><br /> 
                                            <a class="btn btn-danger" href="/FoodDetail?idFood=<?php echo $row2[0] ?>" class="btnmua">Mua</a>
                                         
                                    </div>
                                </div>

                            <?php

                            }
                            ?>
                        </marquee>
                    </div>
                </div>
            </aside>
        </article>
    </div>
    <link href="/Public/DetailFood/css/stypeBody.css" rel="stylesheet">
    <link href="/Public/DetailFood/css/stypeBody.css" rel="stylesheet">

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">H??a ????n thanh to??n</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <td>
                                <b>
                                    <l>T??n b??i t???p :</l>
                                </b>
                            </td>
                            <td>
                                <b>
                                    <l><?= $NameWork ?></l>
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>C???ng ??i???m t??ch l??y:</label>
                            </td>
                            <td>
                                <label><?=UpDownPoint_Sale::ExercisePointUp()?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Th???i h???n :</label>
                            </td>
                            <td>
                                <label><?= $dateEnd ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Gi?? ti???n : </label>
                            </td>
                            <td>
                                <label><?= currency_format($Price); ?> VN??</label><label></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Gi???m gi?? :</label>
                            </td>
                            <td>
                                <label> <?php echo isset($_SESSION['discount_user']) ? $_SESSION['discount_user'] : "Ph???i ????ng nh???p ????" ?></label><label> %</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>T???ng ti???n :</label>
                            </td>
                            <td>
                                <label style="color: red;" id="total" name="total"></label>
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tho??t</button>
                    <button type="button" id="buyOK" class="btn btn-primary">X??c nh???n</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/Public/All/js/jQuery.js"></script>
    <script>
        $(document).ready(function() {
            $("#DKBaitap").click(function() {
                let discount = <?= $discount ?>;
                let total = 0;
                let price = <?= $Price ?>;
                if (discount == -1) {
                    $("#total").text("Ph???i ????ng nh???p");
                } else {
                    total = price - (discount * price) / 100;
                    let x = total.toLocaleString('vi', {
                        style: 'currency',
                        currency: 'VND'
                    });
                    $("#total").text(x);
                }
            })
            $("#buyOK").click(function() {
                let name = $("#name").text();
                let price = $("#price").text();
                let time = $("#thoihan").text();
                let id = <?= $ID ?>;
                $.ajax({
                    type: "POST",
                    url: "/ExerciseDetails/Submit",
                    data: {
                        id: id
                    },
                    success: function(msg) {
                        if (msg == 0) {
                            alert("B??i t???p n??y ???? ????ng k?? v?? ??ang ch??? duy???t ho???c ???? ????ng k?? nh??ng ch??a h???t h???n");
                        }
                        if (msg == 1) {
                            alert("????ng k?? th??nh c??ng v?? ch??? duy???t");
                        }
                        if (msg == -1) {
                            alert("Ph???i ????ng nh???p m???i ????ng l?? ???????c");
                        }
                    }
                })
            })
        })
    </script>
</body>

</html>