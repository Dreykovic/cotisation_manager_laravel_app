'use strict';
let AppNaturesAdd = function () {


    let formNature;

    let natureAddBtn;

    const addNatureUrl = '/natures/store';

    let handleNatureAdd = () => {
        natureAddBtn.addEventListener('click', (e) => {
            e.preventDefault();
            const formData = new FormData(formNature);
            AppModules.sunmitFromBtn(natureAddBtn, formData, addNatureUrl, addNatureCallback)
        })
    }

    let addNatureCallback = () => {


        location.reload()
    }
    return {
        init: () => {

            formNature = document.querySelector('#natureAddForm');
            if (!formNature) {
                return;
            }

            natureAddBtn = formNature.querySelector('.natureAddBtn');

            handleNatureAdd();
        }
    }
}();
document.addEventListener('DOMContentLoaded', (e) => {
    AppNaturesAdd.init();
})