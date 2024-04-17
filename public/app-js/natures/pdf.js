"use strict";
let AppNaturesAdd = (function () {
  let pdfModal;

  let downloadBtn;
  let nature = "";

  let downloadUrl = "";

  let handleDownload = () => {
    downloadBtn.addEventListener("click", (e) => {
      e.preventDefault();
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

      downloadBtn = document.querySelector("#downloadBtn");
      nature = downloadBtn.getAttribute("data-nature-id") ?? "";

      downloadUrl = "/download/pdf/cotisations/" + nature;
      console.log(nature);
      handleDownload();
    },
  };
})();
document.addEventListener("DOMContentLoaded", (e) => {
  AppNaturesAdd.init();
});
