"use strict";
let AppMembresPDF = (function () {
  let pdfModal;

  let downloadBtn;
  let attributField;
  let valueField;
  let filterAttribut;
  let filterValue;


  let handleDownload = () => {



    // console.log(downloadBtn);
    $(downloadBtn).on("click", (e) => {
      e.preventDefault();
      // console.log($(".downloadFilterSelect").val());
      filterAttribut = attributField.val() == null || attributField.val() == "all" ? "" : attributField.val()
      filterValue = valueField.val() == null || valueField.val() == "" || attributField.val() == "all" ? "" : `/${valueField.val()}`
      // console.log(orderBy);
      const downloadUrl = `/download/pdf/membres/${filterAttribut}${filterValue}`;
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

  let handle_filter = () => {
    attributField.on('change', function (e) {
      console.log(valueField);

      // console.log(  valueField.attr('disabled'));
      // valueField.attr('disabled', false);
      valueField.val('');
      valueField.select2('destroy').select2({
        ajax: {
          url: '/download/pdf/get-attribute-value/' + attributField.val(),
          processResults: function (data) {
            console.log(data);
            // Transforms the top-level key of the response object from 'items' to 'results'
            return {
              results: data
            };
          }
        }
      });
    });

  }
  let initValueSelect = () => {
    valueField.select2({
      ajax: {
        url: '/download/pdf/get-attribute-value/' + attributField.val(),
        processResults: function (data) {
          console.log(data);
          // Transforms the top-level key of the response object from 'items' to 'results'
          return {
            results: data
          };
        }
      }
    });
  }
  return {
    init: () => {
      pdfModal = $("#cont-pdf-view");
      if (!pdfModal) {
        return;
      }

      downloadBtn = $(".downloadBtn");
      attributField = $('#attributField');
      valueField = $('#valueField');
      console.log(valueField);

      handleDownload();
      handle_filter()
    },
  };
})();
document.addEventListener("DOMContentLoaded", (e) => {
  AppMembresPDF.init();
});
