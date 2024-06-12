<script src="https://cdn.jsdelivr.net/npm/pdfjs-dist@2.0.385/build/pdf.min.js"></script>
<script>
    function renderPDF(url, canvasContainer, options) {

        options = options || { scale: 2 };

        function renderPage(page) {
            var viewport = page.getViewport(options.scale);
            var wrapper = document.createElement("div");
            wrapper.className = "canvas-wrapper";
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };

            canvas.height = viewport.height;
            canvas.width = viewport.width;
            wrapper.appendChild(canvas)
            canvasContainer.appendChild(wrapper);

            page.render(renderContext);
        }

        function renderPages(pdfDoc) {
            for(var num = 1; num <= pdfDoc.numPages; num++)
                pdfDoc.getPage(num).then(renderPage);
        }

        PDFJS.disableWorker = true;
        PDFJS.getDocument(url)
        .then(renderPages)
        .then(() => {
            $('.wrapper-loading').attr('style', 'display:none')
        });
    }

    $('.wrapper-loading').attr('style', 'display:auto')

    var element = $('div.file-pdf')
    var file_source = '{{ asset("assets/e-pinter/ebook/v4/BUKU MODEL E-PINTER.pdf") }}';
    if ( element.attr('id') == 'info-epinter' ) {
        file_source = '{{ asset("assets/e-pinter/ebook/v2/Panduan E-PINTER.pdf") }}';
    } else if ( element.attr('id') == 'info-tracker' ) {
        file_source = '{{ asset("assets/e-pinter/ebook/v2/TUTORIAL PENGGUNAAN SOFTWARE TRACKER FIX.pdf") }}';
    }

    renderPDF(file_source, element[0]);
</script>
