<link rel="stylesheet" href="<?= $proyect['url'] ?>view/css.public/sidebar.css">
<div class="sidebar bg-dark">
    <button class="burguer-button" onclick="handleBurgerSidebar()">
        <i class="fa-solid fa-bars text-light"></i>
    </button>
    <div class="sidebar-header">
        <h4 class="text-truncate p-2">Lottery</h4>
    </div>
    <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/1/1e/RPC-JP_Logo.png" alt="Logo">
    <!-- List | ini -->
    <ul class="list-group rounded-0 p-2 border-0">
        <a href="<?= $proyect['url'] ?>home" class="nav-option btn btn-outline-primary border-0 text-start p-3 mb-2 <?= ($currentPage == "home") ? "shadow  active" : "" ?>">
            <i class="fa-solid fa-house"></i>
            <span class="ms-2">Inicio</span>
        </a>
        <a href="<?= $proyect['url'] ?>users" class="nav-option btn btn-outline-primary border-0 text-start p-3 mb-2 <?= ($currentPage == "users") ? "shadow active" : "" ?>">
            <i class="fa-solid fa-user"></i>
            <span class="ms-2">Usuarios</span>
        </a>
        <a href="<?= $proyect['url'] ?>tables" class="nav-option btn btn-outline-primary border-0 text-start p-3 mb-2 <?= ($currentPage == "tables") ? "shadow active" : "" ?>">
            <i class="fa-solid fa-table-cells"></i>
            <span class="ms-2">Tableros</span>
        </a>
    </ul>
    <!-- List | end -->

</div>