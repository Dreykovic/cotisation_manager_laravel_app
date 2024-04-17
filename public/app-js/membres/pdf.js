"use strict";
let AppMembresPDF = (function () {
  let pdfModal;

  let downloadBtn;




  let handleDownload = () => {



    // console.log(downloadBtn);
    $(downloadBtn).on("click", (e) => {
      e.preventDefault();
      // console.log($(".downloadFilterSelect").val());
      const orderBy = $(".downloadFilterSelect").val() ?? "";
      // console.log(orderBy);
      const downloadUrl = "/download/pdf/membres/" + orderBy;
      console.log(downloadUrl);
      axios
        .get(downloadUrl, {
          responseType: "blob", // indique que la réponse est un blob
        })
        .then((response) => {
          const url = window.URL.createObjectURL(new Blob([response.data]));
          let iframeContainer = $("#iframe-container");
          let iframe = `<iframe src="${url}" width="100%" height="600px">
                </iframe> `;
          iframeContainer.html(iframe);
          pdfModal.modal("show");
        })
        .catch((error) => {
          console.error("Erreur lors du téléchargement du PDF:", error);
        });
    });


  };

  let addNatureCallback = () => {
    location.reload();
  };
  return {
    init: () => {
      pdfModal = $("#cont-pdf-view");
      if (!pdfModal) {
        return;
      }

      downloadBtn = $(".downloadBtn");


      handleDownload();
    },
  };
})();
document.addEventListener("DOMContentLoaded", (e) => {
  AppMembresPDF.init();
});
