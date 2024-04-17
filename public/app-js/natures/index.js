'use strict';

let AppNaturesDelete = function () {
    let deleteBtns;

    let handleMembersDelete = () => {
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let deleteUrl = "/natures/delete/" + btn.id;
                let parent = e.target.closest('div.parent');
                let nature = parent.querySelector('.nature').innerText;
                AppModules.deleteTableItemSubmission(btn, parent, nature, deleteUrl);

            })
        });
    }
    return {
        init: () => {

            deleteBtns = document.querySelectorAll('.deleteBtn');


            handleMembersDelete();
            // console.log(445);
        }
    }
}();
document.addEventListener('DOMContentLoaded', (e) => {
    AppNaturesDelete.init();
})