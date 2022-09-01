<!DOCTYPE html>
<html lang="<?= $proyect['lang'] ?>">

<head>
    <?php include('./view/component.public/head.php') ?>
    <link rel="stylesheet" href="<?= $proyect['url'] ?>view/css.public/table.css">
    <title><?= $lottery_table_r['lottery_table_name'] ?></title>
</head>

<body>
    <?php include('./view/component.public/header.php') ?>
    <?php include('./view/component.public/sidebar.php') ?>
    <main style="overflow:hidden">
        <table class="table border table-game" id="element-table">
            <tr>
                <td class="p-0 border-start border-primary">
                    <h3 class="marker-gift text-center"></h3>
                </td>
                <?php for ($x = 0; $x < $lottery_table_r['lottery_table_columns']; $x++) { ?>
                    <td class="p-0 border-start border-primary td-gift">
                        <h3 class="marker-gift text-center"><?= getLetter($x) ?></h3>
                    </td>
                <?php } ?>
                <td class="p-0 border-start border-primary">
                    <h3 class="marker-gift text-center"></h3>
                </td>
            </tr>
            <?php for ($y = 0; $y < $lottery_table_r['lottery_table_rows']; $y++) { ?>
                <tr>
                    <td class="p-0 border-start border-primary td-gift">
                        <h3 class="marker-gift text-center"><?= $y + 1 ?></h3>
                    </td>
                    <?php
                    for ($x = 0; $x < $lottery_table_r['lottery_table_columns']; $x++) {
                        $gift = null;
                        $gift_id = 0;
                        $gift_img = $proyect['url'] . 'view/img/mourn.webp';
                        for ($gift_index = 0; $gift_index < count($gift_array); $gift_index++) {
                            if ($gift_array[$gift_index]['gift_row'] == $y and $gift_array[$gift_index]['gift_column'] == $x) {
                                $gift = $gift_array[$gift_index];
                                $gift_id = $gift['gift_id'];
                                if ($gift['gift_img'] != null) {
                                    $gift_img = $proyect['url'] . 'view/img/gift_img/' . $gift['gift_img'];
                                } else {
                                    $gift_img = $proyect['url'] . 'view/img/gift_open.png';
                                }
                                $gift_index = count($gift_array);
                            }
                        }
                    ?>
                        <td class="p-0 border-start border-primary td-gift" x="<?= $x ?>" y="<?= $y ?>">
                            <div class="item-gift" gift_id="<?= $gift_id ?>">
                                <div class="item-gift-container">
                                    <div class="view">
                                        <div class="item-gift-gif"></div>
                                    </div>
                                    <div class="view">
                                        <img class="item-gift-img" src="<?= $gift_img ?>" alt="Image gift">
                                    </div>
                                </div>
                            </div>
                        </td>
                    <?php } ?>
                    <td class="p-0 border-start border-primary td-gift">
                        <h3 class="marker-gift text-center"><?= $y + 1 ?></h3>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td class="p-0 border-start border-primary">
                    <h3 class="marker-gift text-center"></h3>
                </td>
                <?php for ($x = 0; $x < $lottery_table_r['lottery_table_columns']; $x++) { ?>
                    <td class="p-0 border-start border-primary td-gift">
                        <h3 class="marker-gift text-center"><?= getLetter($x) ?></h3>
                    </td>
                <?php } ?>
                <td class="p-0 border-start border-primary">
                    <h3 class="marker-gift text-center"></h3>
                </td>
            </tr>
        </table>
        <!-- MODAL FORM | ini -->
        <div class="modal fade" id="modalWinner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalWinnerLabel" aria-hidden="true">
            <canvas id="canvas-confetti"></canvas>
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" id="formwinner" onsubmit="return false" novalidate>
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalWinnerLabel">
                            <i class="fa-solid fa-gift"></i>
                            <span>Tenemos un ganador!</span>
                        </h5>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12 p-4">
                                <label for="validationServer01" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="validationServer01" placeholder="Mark" name="gift_winner" required>
                                <div class="invalid-feedback">
                                    Escribe el nombre del ganador!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                        <button type="submit" class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                            <span>Guardar</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- MODAL FORM | end -->
    </main>
</body>
<foot>
    <?php include('./view/component.public/foot.php') ?>
    <script src="<?= $proyect['url'] ?>control/library/confetti.min.js"></script>
    <script src="<?= $proyect['url'] ?>control/script.public/table.js"></script>
</foot>

</html>