'use strict';
let AppCotisationsAdd = function () {

    let formCotisation;

    let cotisationAddBtn;

    const addCotisationUrl = '/cotisations/store';

    const redirectUrl = '/cotisations/liste';

    let handleCotisationAdd = () => {
        cotisationAddBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const formData = new FormData(formCotisation);
            AppModules.sunmitFromBtn(cotisationAddBtn, formData, addCotisationUrl, addCotisationCallback)
        })
    }

    let addCotisationCallback = () => {
        formCotisation.reset()
        location.reload()


    }

    return {
        init: () => {
            formCotisation = document.querySelector('#cotisationAddForm');

            if (!formCotisation) {
                return;
            }
            cotisationAddBtn = formCotisation.querySelector('.cotisationAddBtn');
            if (!cotisationAddBtn) {
                return;
            }

            handleCotisationAdd();

        }
    }
}();
document.addEventListener('DOMContentLoaded', (e) => {
    AppModules.resetForms();
    AppCotisationsAdd.init();
})