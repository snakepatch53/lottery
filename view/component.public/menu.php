<?php
function getItems($proyect, $productos_rs)
{
    $html = "";
    foreach ($productos_rs as $producto) {
        ob_start();
        $img_producto = ($producto['producto_img'] !== null and $producto['producto_img'] !== "") ? $proyect['url'] . "/view/src/files/producto_img/" . $producto['producto_img'] : $proyect['url'] . "/view/img/product.png";
?>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
            <div class="card card-menu">
                <img src="<?= $img_producto ?>" class="card-menu-img card-img-top" alt="<?= $producto['producto_nombre'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $producto['producto_nombre'] ?></h5>
                    <p class="card-text card-menu-text"><?= $producto['producto_descripcion'] ?></p>
                    <button class="btn w-100 btn-outline-primary btn-producto" producto-id="<?= $producto['producto_id'] ?>">
                        Agregar al Carrito
                        <i class="fa-solid fa-cart-plus"></i>
                    </button>
                </div>
            </div>
        </div>
<?php
        $html .= ob_get_clean();
    }
    return $html;
}
?>

<h1 class="text-center text-primary my-5">NUESTRO MENU</h1>

<div class="container mb-5">
    <div class="row g-3">
        <?= getItems($proyect, $productos_rs) ?>
    </div>
</div>