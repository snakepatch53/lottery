// general declarations
const itemsGift = document.querySelectorAll(".item-gift");
const $formwinner = document.getElementById("formwinner");
const $element_gift_winn = document.getElementById("element-gift-winn");
const $element_container_exhausted = document.getElementById("element-gift-container-exhausted");
const $element_container_available = document.getElementById("element-gift-container-available");

// instance bootstrap modals
const modalWinner = new bootstrap.Modal(document.getElementById("modalWinner"), {
    keyboard: true,
    /* para bloquear salir con la tecla "esc" */
    // keyboard: false,
    // backdrop: "static",
});

// main function
function main() {
    uiFunction.formInit();
    // $formwinner.onsubmit = () => crudFunction.updateWinner();
    uiFunction.clickEventInit();
    uiFunction.confettiInit();
    uiFunction.refreshGameStatusbar();
}

//functiones de manejo
const handleFunction = {};

// functiones de interfaz
const uiFunction = {
    formInit: function () {
        "use strict";
        $formwinner.onsubmit = function (event) {
            if (!$formwinner.checkValidity()) {
                event.stopPropagation();
                event.preventDefault();
            }
            if ($formwinner.checkValidity()) {
                event.preventDefault();
                crudFunction.updateWinner($formwinner);
                // console.log("validate!");
            }

            $formwinner.classList.add("was-validated");
        };
    },
    clickEventInit: function () {
        itemsGift.forEach(($itemGift) => {
            $itemGift.onclick = (evt) => {
                $itemGift.classList.add("active");
                if ($itemGift.getAttribute("gift_id") == 0) return;
                const gift_id = $itemGift.getAttribute("gift_id");
                $formwinner.gift_id.value = gift_id;
                $element_gift_winn.innerHTML = uiFunction.getGiftHtml(gift_id);
                modalWinner.show();
            };
        });
    },
    confettiInit: function () {
        var confettiSettings = { target: "canvas-confetti" };
        var confetti = new ConfettiGenerator(confettiSettings);
        confetti.render();
    },
    getGiftHtml: function (gift_id) {
        $gift = $gift_array.find((el) => el.gift_id == gift_id);
        let img_rsc = $proyect.url + "view/img/gift_open.png";
        if ($gift.gift_img) img_rsc = $proyect.url + "view/img/gift_img/" + $gift.gift_img;
        return `
            <h5>${$gift.gift_name}</h5>
            <img class="image-gift-winn" src="${img_rsc}" alt="Gift image"/>
        `;
    },
    refreshGameStatusbar: function () {
        let htmlAvailable = "";
        let htmlExhausted = "";
        $gift_array.forEach((gift) => {
            if (gift.gift_winner != null && gift.gift_winner != "") {
                htmlAvailable += this.getItemGameStatusbar(gift);
            } else {
                htmlExhausted += this.getItemGameStatusbar(gift);
            }
        });
        $element_container_exhausted.innerHTML = htmlAvailable;
        $element_container_available.innerHTML = htmlExhausted;
    },
    getItemGameStatusbar: function ({ gift_img, gift_name, gift_descr, gift_winner }) {
        let srcImg = $proyect.url + "view/img/gift_open.png";
        let descr = gift_descr;
        if (gift_img != null && gift_img != "") srcImg = $proyect.url + "view/img/gift_img/" + gift_img;
        if (gift_winner != null && gift_winner != "") descr = `${gift_winner}`;

        return `
            <div class="card-item">
                <img src="${srcImg}" alt="Gift image">
                <div class="card-item-body">
                    <h6 class="card-title text-dark">${gift_name}</h6>
                    <p class="card-text">${descr}</p>
                </div>
            </div>
        `;
    },
};

//functiones de base de datos
const crudFunction = {
    updateWinner: function () {
        console.log($gift_array);
        for (let gift_index = 0; gift_index < $gift_array.length; gift_index++) {
            console.log($gift_array[gift_index].gift_id);
            console.log($formwinner.gift_id.value);
            if ($gift_array[gift_index].gift_id == $formwinner.gift_id.value) {
                $gift_array[gift_index].gift_winner = $formwinner.gift_winner.value;
            }
        }
        // console.log($gift_array);

        const formData = new FormData($formwinner);
        fetch_query(formData, "gift", "updateWinner").then((res) => {
            $formwinner.reset();
            $formwinner.classList.remove("was-validated");
            modalWinner.hide();
            uiFunction.refreshGameStatusbar();
        });
    },
};

// main execute
main();
