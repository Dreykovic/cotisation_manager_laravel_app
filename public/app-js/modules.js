"use strict";

// Class definition
const AppModules = function () {

    // Public functions
    return {
        // Initialization

        showSpinner: (btn) => {
            if (!btn) return;

            let spinner = btn.querySelector('.indicateur');
            let normalStatut = btn.querySelector('.normal-status');

            spinner.classList.remove('d-none');
            normalStatut.style.display = 'none';
            btn.disabled = true;


        },

        hideSpinner: (btn) => {
            if (!btn) return;

            let spinner = btn.querySelector('.indicateur');
            let normalStatut = btn.querySelector('.normal-status');


            spinner.classList.add('d-none');
            normalStatut.style.display = 'block';
            btn.disabled = false;


        },
        showAskAlert: (message = '') => {
            return Swal.fire({
                text: message,
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Oui, Supprimer",
                cancelButtonText: "Non, Annuler",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            });
        },
        showConfirmAlert: (message = '', status = "error", confirm = "Ok, compris!") => {
            return Swal.fire({
                text: message,
                icon: status,
                buttonsStyling: false,
                confirmButtonText: confirm,
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        },

        sunmitFromBtn: (btn, formData, url, callback) => {
            if (btn == null || !formData || !url) {
                return 'somthing is not get'
            }

            // Validate form

            AppModules.showSpinner(btn)



            // console.log(formData);

            // Check axios library docs: https://axios-http.com/docs/intro
            axios.post(url, formData)
                .then(function (response) {
                    if (response.data.ok) {
                        // Hide loading indication
                        AppModules.hideSpinner(btn);
                        AppModules.showConfirmAlert(response.data.message, 'success').then(function (result) {
                            if (result.isDismissed || result.isConfirmed) {
                                if (callback == null) {
                                    location.href = "/membres/numero/" + response.data.membre_id;
                                } else {
                                    callback();

                                }


                            }

                        });

                    } else {
                        AppModules.hideSpinner(btn)
                        AppModules.showConfirmAlert(response.data.message);

                    }
                }).catch(function (error) {
                    if (error.response && error.response.data && error.response.data.message) {
                        // Remove loading indication
                        AppModules.hideSpinner(btn);

                        console.error('Erreur de soumission du formulaire:', error.response.data.message);

                        AppModules.showConfirmAlert(error.response.data.message);
                    } else {
                        //  Remove loading indication
                        AppModules.hideSpinner(btn);

                        AppModules.showConfirmAlert("Erreur de soumission du formulaire:" + error);


                    }
                });



        },
        deleteTableItemSubmission: (btn, parent, item, url) => {




            // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
            AppModules.showAskAlert("Etes-vous sûr que vous voulez supprimer " + item + "?").then(function (result) {
                if (result.value) {
                    AppModules.showSpinner(btn)

                    //  console.log(15000)
                    axios.delete(url).then(response => {
                        if (response.data.ok) {
                            AppModules.hideSpinner(btn)

                            AppModules.showConfirmAlert(response.data.message, 'success').then(function (result) {
                                if (result.isDismissed || result.isConfirmed) {
                                    // Remove current row
                                    if (parent) {
                                        parent.remove();
                                    }
                                }

                            });
                        } else {
                            AppModules.showConfirmAlert(response.data.message);
                            AppModules.hideSpinner(btn)

                        }
                    }).catch(error => {
                        if (error.response && error.response.data && error.response.data.message) {
                            AppModules.hideSpinner(btn)

                            console.error('Erreur de soumission du formulaire:', error.response.data.message);
                            AppModules.showConfirmAlert('Erreur de soumission du formulaire:', error.response.data.message);


                        } else {
                            AppModules.showConfirmAlert("Erreur de soumission du formulaire:" + error);
                            AppModules.hideSpinner(btn)

                        }
                    })

                } else if (result.dismiss === 'cancel') {

                    AppModules.showConfirmAlert(item + " N'a pas été effacé");
                    AppModules.hideSpinner(btn)

                }
            });



        },
        resetForms: () => {
            let forms = document.getElementsByTagName('form');
            for (const element of forms) {
                element.reset();
            }
        },
        init: function () {
            console.log('all modules loaded');

        },
    };
}();


AppModules.init();

