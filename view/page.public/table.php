<!DOCTYPE html>
<html lang="<?= $proyect['lang'] ?>">

<head>
    <?php include('./view/component.public/head.php') ?>
    <title>Inicio</title>
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
                        <h3 class="marker-gift text-center"><?= $letters[$x] ?></h3>
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
                    <?php for ($x = 0; $x < $lottery_table_r['lottery_table_columns']; $x++) { ?>
                        <td class="p-0 border-start border-primary">
                            <div class="item-gift" x="<?= $x ?>" y="<?= $y ?>"></div>
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
                        <h3 class="marker-gift text-center"><?= $letters[$x] ?></h3>
                    </td>
                <?php } ?>
                <td class="p-0 border-start border-primary">
                    <h3 class="marker-gift text-center"></h3>
                </td>
            </tr>
        </table>
    </main>
</body>
<foot>
    <?php include('./view/component.public/foot.php') ?>
    <script src="<?= $proyect['url'] ?>control/script.public/table.js"></script>
</foot>

</html>