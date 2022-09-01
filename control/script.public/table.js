// general declarations
const itemsGift = document.querySelectorAll(".item-gift");
const $formwinner = document.getElementById("formwinner");

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
                // crudFunction.insertUpdate($$formwinner);
                console.log("validate!");
            }

            $formwinner.classList.add("was-validated");
        };
    },
};

//functiones de base de datos
const crudFunction = {};

//pediente
itemsGift.forEach(($itemGift) => {
    $itemGift.onclick = (evt) => $itemGift.classList.add("active");
});

var confettiSettings = { target: "canvas-confetti" };
var confetti = new ConfettiGenerator(confettiSettings);
confetti.render();

// main execute
main();
