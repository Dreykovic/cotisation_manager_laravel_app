"use strict";
let AppNaturesAdd = (function () {
  let pdfModal;

  let downloadBtns;
  let nature = "";

  let downloadUrl = "";

  let handleDownload = () => {

    downloadBtns.each((index, downloadBtn) => {

      console.log(downloadBtn);
      $(downloadBtn).on("click", (e) => {
        e.preventDefault();
        nature = $(downloadBtn).data("nature-id") ?? "";
        console.log(nature);
        downloadUrl = "/download/pdf/cotisations/" + nature;
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
    })

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

      downloadBtns = $(".downloadBtn");


      handleDownload();
    },
  };
})();
document.addEventListener("DOMContentLoaded", (e) => {
  AppNaturesAdd.init();
});
