'use strict';
let AppLogin = function () {
    let loginForm;
    let submitBtn;
    let submitUrl;
    let redirectUrl;
    let handleLogin = () => {
        submitBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const formData = new FormData(loginForm);
            AppModules.sunmitFromBtn(submitBtn, formData, submitUrl, loginCallback)
        })
    }
    let loginCallback = () => {
        if (!redirectUrl) {
            return
        }
        location.href = redirectUrl;
    }
    return {
        init: () => {
            loginForm = document.querySelector('#loginForm');
            submitBtn = document.querySelector('#submitBtn');
            if (!loginForm || !submitBtn) {
                console.error('sommething went wrong !!!')
                return
            }
            submitUrl = "/login";
            redirectUrl = "/home";
            handleLogin();
            // console.log('form get');

        }
    }
}();
document.addEventListener('DOMContentLoaded', () => {
    AppLogin.init();

});