"use strict";
let AppRegister = (function () {
    let registerForm;
    let submitBtn;
    let submitUrl;

    let handleRegister = () => {
        submitBtn.addEventListener("click", (e) => {
            e.preventDefault();
            const formData = new FormData(registerForm);
            // console.log(formData);
            AppModules.sunmitFromBtn(submitBtn, formData, submitUrl, null);
            // console.log(data);
        });
    };

    return {
        init: () => {
            registerForm = document.querySelector("#registerForm");
            submitBtn = document.querySelector("#submitBtn");
            if (!registerForm || !submitBtn) {
                console.error("sommething went wrong !!!");
                return;
            }
            submitUrl = "/membres/store";

            handleRegister();
            // console.log('form get');
        },
    };
})();
document.addEventListener("DOMContentLoaded", () => {
    AppRegister.init();
});
