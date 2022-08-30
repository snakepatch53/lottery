const forms = document.querySelectorAll(".needs-validation");
const $form = document.getElementById("element-lotteryform");
// const $element_lottery_table_pass = document.querySelector("form input[name=usuario_pass]");
const $element_table_lottery = document.getElementById("element-table-lottery");
const bootstrap_modalform = new bootstrap.Modal(document.getElementById("element-modalform"), {
    keyboard: false,
});
const bootstrap_modalconfirm = new bootstrap.Modal(document.getElementById("element-modalconfirm"), {
    keyboard: false,
});

async function main() {
    crudFunction.select();
    formInit();
}

//functions
function formInit() {
    "use strict";

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener(
            "submit",
            function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                if (form.checkValidity()) {
                    event.preventDefault();
                    crudFunction.insertUpdate($form);
                }

                form.classList.add("was-validated");
            },
            false
        );
    });
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
            console.log(res);
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
};

const uiFunction = {
    lottery_tableDatabase: [],
    getTrlottery_table: function ({
        lottery_table_id,
        lottery_table_name,
        lottery_table_date,
        lottery_table_create,
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
                <td class="d-none d-md-table-cell">en ${durationEvent.humanize()}</td>
                <td class="d-none d-md-table-cell">hace ${durationCreate.humanize()}</td>
                <td class="text-center">
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
        $form.reset();
        this.modalForm_clear();
    },
    modalForm_clear: function () {
        $form.reset();
        $form.classList.remove("was-validated");
    },
    modalConfirm_hide: function () {
        bootstrap_modalconfirm.hide();
    },
};

main();
