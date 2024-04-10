'use strict';
let AppMembreUpdate = function () {

    let formMembreUpdate;

    let membreUpdateBtn;

    const updateMembreUrl = '/membres/settings/info/update';



    let handleMembreUpdate = () => {
        membreUpdateBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const formData = new FormData(formMembreUpdate);
            AppModules.sunmitFromBtn(membreUpdateBtn, formData, updateMembreUrl, updateMembreCallback)
        })
    }

    let updateMembreCallback = () => {

        location.reload()
    }

    return {
        init: () => {
            formMembreUpdate = document.querySelector('#membreUpdateForm');

            if (!formMembreUpdate) {
                return;
            }
            membreUpdateBtn = formMembreUpdate.querySelector('.membreUpdateBtn');


            handleMembreUpdate();

        }
    }
}();
document.addEventListener('DOMContentLoaded', (e) => {
    AppMembreUpdate.init();
})