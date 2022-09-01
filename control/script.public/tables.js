const forms = document.querySelectorAll(".needs-validation");
const $form = document.getElementById("element-lotteryform");
const $element_table_lottery = document.getElementById("element-table-lottery");
const bootstrap_modalform = new bootstrap.Modal(document.getElementById("element-modalform"), {
    keyboard: false,
});
const bootstrap_modalconfirm = new bootstrap.Modal(document.getElementById("element-modalconfirm"), {
    keyboard: false,
});

// gift declarations
const $element_table_gift = document.getElementById("element-table-gift");
const $form_gift = document.getElementById("element-giftform");
const element_modalgift = new bootstrap.Modal(document.getElementById("element-modalgift"), {
    keyboard: false,
});

async function main() {
    await crudFunction.select();
    await crudFunction.selectGift();
    formInit();
}

//functions
function formInit() {
    "use strict";

    // Loop over them and prevent submission

    $form.addEventListener(
        "submit",
        function (event) {
            if (!$form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            if ($form.checkValidity()) {
                event.preventDefault();
                crudFunction.insertUpdate($form);
            }

            $form.classList.add("was-validated");
        },
        false
    );
    $form_gift.addEventListener(
        "submit",
        function (event) {
            event.preventDefault();
            if (!$form_gift.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            if ($form_gift.checkValidity()) {
                event.preventDefault();
                crudFunction.insertGift();
            }

            $form_gift.classList.add("was-validated");
            return false;
        },
        false
    );
}

const handleFunction = {
    new: function () {
        uiFunction.modalForm_clear();
        $form.lottery_table_id.value = 0;
        bootstrap_modalform.show();
    },
    edit: function (lottery_table_id) {
        const lottery_table = uiFunction.lottery_tableDatabase.find((el) => el.lottery_table_id == lottery_table_id);
        setValuesForm(lottery_table, $form);
        bootstrap_modalform.show();
    },
    delete: function (lottery_table_id) {
        $form.lottery_table_id.value = lottery_table_id;
        bootstrap_modalconfirm.show();
    },

    // gift functions
    giftTrButton: function (lottery_table_id) {
        $form_gift.lottery_table_id.value = lottery_table_id;
        uiFunction.refreshTableGift(lottery_table_id);
        element_modalgift.show();
    },
};

const crudFunction = {
    select: async function () {
        const formData = new FormData($form);
        await fetch_query(formData, "lottery_table", "selectByUser_id").then((res) => {
            uiFunction.lottery_tableDatabase = res;
            uiFunction.refreshTable();
        });
    },
    insertUpdate: function (form) {
        const formData = new FormData(form);
        const action = $form.lottery_table_id.value == 0 ? "insert" : "update";
        fetch_query(formData, "lottery_table", action).then((res) => {
            uiFunction.modalForm_hide();
            this.select();
        });
    },
    delete: function () {
        const formData = new FormData($form);
        fetch_query(formData, "lottery_table", "delete").then((res) => {
            uiFunction.modalForm_hide();
            this.select();
            uiFunction.modalConfirm_hide();
        });
    },

    // gift functions
    selectGift: async function () {
        const formData = new FormData($form);
        await fetch_query(formData, "gift", "select").then((res) => {
            uiFunction.giftDatabase = res;
        });
    },
    insertGift: function () {
        const formData = new FormData($form_gift);
        fetch_query(formData, "gift", "insert").then(async (res) => {
            await this.selectGift();
            uiFunction.refreshTableGift($form_gift.lottery_table_id.value);
            $form_gift.reset();
            $form_gift.classList.remove("was-validated");
        });
    },
    deleteGift: function (gift_id) {
        const formData = new FormData();
        formData.append("gift_id", gift_id);
        fetch_query(formData, "gift", "delete").then(async (res) => {
            await this.selectGift();
            uiFunction.refreshTableGift($form_gift.lottery_table_id.value);
        });
    },
};

const uiFunction = {
    lottery_tableDatabase: [],
    giftDatabase: [],
    getTrlottery_table: function ({
        lottery_table_id,
        lottery_table_name,
        lottery_table_date,
        lottery_table_create,
        lottery_table_rows,
        lottery_table_columns,
        currentdate,
    }) {
        const currentDate = moment(new Date(currentdate));
        const eventDate = moment(new Date(lottery_table_date));
        const creationDate = moment(new Date(lottery_table_create));
        const durationEvent = moment.duration(eventDate.diff(currentDate));
        const durationCreate = moment.duration(creationDate.diff(currentDate));
        return `
            <tr>
                <td class="d-none d-md-table-cell fw-bold">${lottery_table_id}</td>
                <td class="text-center text-md-left">${lottery_table_name}</td>
                <td class="text-center text-md-left">${lottery_table_rows + " x " + lottery_table_columns}</td>
                <td class="d-none d-md-table-cell">en ${durationEvent.humanize()}</td>
                <td class="d-none d-md-table-cell">hace ${durationCreate.humanize()}</td>
                <td class="text-center">
                    <a class="btn btn-outline-dark" href="${$proyect.url}tables/${lottery_table_id}">
                        <i class="fa-solid fa-play"></i>
                    </a>
                    <button class="btn btn-outline-success" onclick="handleFunction.giftTrButton(${lottery_table_id})">
                        <i class="fa-solid fa-gift"></i>
                    </button>
                    <button class="btn btn-outline-primary" onclick="handleFunction.edit(${lottery_table_id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                    <button class="btn btn-outline-danger" onclick="handleFunction.delete(${lottery_table_id})">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        `;
    },
    refreshTable: function () {
        let html = "";
        for (let lottery_table of this.lottery_tableDatabase) {
            html += this.getTrlottery_table(lottery_table);
        }
        $element_table_lottery.innerHTML = html;
    },
    modalForm_hide: function () {
        bootstrap_modalform.hide();
        this.modalForm_clear();
    },
    modalForm_clear: function () {
        $form.reset();
        $form.classList.remove("was-validated");
    },
    modalConfirm_hide: function () {
        bootstrap_modalconfirm.hide();
    },

    // gift functions
    getTrGift: function ({ gift_id, gift_name, gift_img, gift_winner }) {
        const img_url = $proyect.url + "view/img/" + (gift_img ? "gift_img/" + gift_img : "gift.png");
        const winner = gift_winner ?? "Disponible";
        return `
            <tr>
                <td class="d-none d-md-table-cell fw-bold">${gift_id}</td>
                <td class="text-center text-md-left">${gift_name}</td>
                <td class="d-none d-md-table-cell"><img class="gift-image-modal-table" src="${img_url}" alt="Gift Image" /></td>
                <td class="d-none d-md-table-cell">${winner}</td>
                <td class="text-center">
                    <button class="btn btn-outline-danger" onclick="crudFunction.deleteGift(${gift_id})">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </td>
            </tr>
        `;
    },
    refreshTableGift: function (lottery_table_id) {
        const gifts = uiFunction.giftDatabase.filter((el) => el.lottery_table_id == lottery_table_id);
        let html = "";
        for (let gift of gifts) {
            html += this.getTrGift(gift);
        }
        $element_table_gift.innerHTML = html;
    },
};

main();
