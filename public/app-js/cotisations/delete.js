'use strict';

let AppCotisationDelete = function () {
    let deleteBtns;
    let table;
    let handleMembersDelete = () => {
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let deleteUrl = "/cotisations/delete/" + btn.id;
                let parent = e.target.closest('tr');

                AppModules.deleteTableItemSubmission(btn, parent, '', deleteUrl);

            })
        });
    }
    return {
        init: () => {
            table = document.querySelector('#cotisationTable');
            if (!table) {
                return
            }
            deleteBtns = table.querySelectorAll('.deleteBtn');


            handleMembersDelete();

        }
    }
}();
document.addEventListener('DOMContentLoaded', (e) => {
    AppCotisationDelete.init();
})