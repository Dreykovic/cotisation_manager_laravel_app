'use strict';
let AppMembreUpdate = function () {

    let formResetPwd;

    let pwdResetBtn;

    const updateMembreUrl = '/membres/settings/info/update';



    let handleMembreUpdate = () => {
        pwdResetBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const formData = new FormData(formResetPwd);
            AppModules.sunmitFromBtn(pwdResetBtn, formData, updateMembreUrl, updateMembreCallback)
        })
    }

    let updateMembreCallback = () => {

        location.reload()
    }

    return {
        init: () => {
            formResetPwd = document.querySelector('#pwdResetForm');

            if (!formResetPwd) {
                return;
            }
            pwdResetBtn = formResetPwd.querySelector('.pwdResetBtn');


            handleMembreUpdate();

        }
    }
}();
document.addEventListener('DOMContentLoaded', (e) => {
    AppMembreUpdate.init();
})