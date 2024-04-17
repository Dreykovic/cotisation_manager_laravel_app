'use strict';

let AppMembersIndex = function () {
    let deleteBtns;
    let table;
    let handleMembersDelete = () => {
        deleteBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                let deleteUrl = "/membres/delete/" + btn.id;
                let parent = e.target.closest('tr');
                let membre = parent.querySelector('.memberName').innerText;
                // console.log(membre);
                AppModules.deleteTableItemSubmission(btn, parent, membre, deleteUrl);

            })
        });
    }
    return {
        init: () => {
            table = document.querySelector('#membersTable');
            if (!table) {
                return
            }
            deleteBtns = table.querySelectorAll('.deleteBtn');



            handleMembersDelete();
            // console.log(445);
        }
    }
}();
document.addEventListener('DOMContentLoaded', (e) => {
    AppMembersIndex.init();
})