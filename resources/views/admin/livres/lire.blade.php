@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <button id="prev" class="btn btn-primary rounded-circle" title="Page précedente"><i class="fas fa-chevron-circle-left"></i></button>
            </div>
            <div class="col-md-8 text-center">
                <span> Page: <span id="page_num"></span> / <span id="page_count"></span></span>
            </div>
            <div class="col-md-2 text-right">
                <button id="next" class="btn btn-primary rounded-circle" title="Page suivante"><i class="fas fa-chevron-circle-right"></i></button>
            </div>
        </div>
    </div>
    
  
    <div class="container text-center mt-2">
        <div class="row">
            <div class="col-md-12">
                <canvas id="the-canvas"></canvas>
            </div>
        </div>
    </div>

@endsection

@section('pdf')
<script src="{{ asset('backend/js/pdf.min.js') }}"></script>
<script src="{{ asset('backend/js/pdf.worker.js') }}"></script>

<script id="script">
    //
    // If absolute URL from the remote server is provided, configure the CORS
    // header on that server.
    //
    var url = "{{ asset($livre->livre) }}";
  
    //
    // In cases when the pdf.worker.js is located at the different folder than the
    // PDF.js's one, or the PDF.js is executed via eval(), the workerSrc property
    // shall be specified.
    //
    
    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 1.9,
        canvas = document.getElementById('the-canvas'),
        ctx = canvas.getContext('2d');
  
    /**
     * Get page info from document, resize canvas accordingly, and render page.
     * @param num Page number.
     */
    function renderPage(num) {
      pageRendering = true;
      // Using promise to fetch the page
      pdfDoc.getPage(num).then(function(page) {
        var viewport = page.getViewport({ scale: scale, });
        canvas.height = viewport.height;
        canvas.width = viewport.width;
  
        // Render PDF page into canvas context
        var renderContext = {
          canvasContext: ctx,
          viewport: viewport,
        };
        var renderTask = page.render(renderContext);
  
        // Wait for rendering to finish
        renderTask.promise.then(function () {
          pageRendering = false;
          if (pageNumPending !== null) {
            // New page rendering is pending
            renderPage(pageNumPending);
            pageNumPending = null;
          }
        });
      });
  
      // Update page counters
      document.getElementById('page_num').textContent = num;
    }
  
    /**
     * If another page rendering in progress, waits until the rendering is
     * finised. Otherwise, executes rendering immediately.
     */
    function queueRenderPage(num) {
      if (pageRendering) {
        pageNumPending = num;
      } else {
        renderPage(num);
      }
    }
  
    /**
     * Displays previous page.
     */
    function onPrevPage() {
      if (pageNum <= 1) {
        return;
      }
      pageNum--;
      queueRenderPage(pageNum);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);
  
    /**
     * Displays next page.
     */
    function onNextPage() {
      if (pageNum >= pdfDoc.numPages) {
        return;
      }
      pageNum++;
      queueRenderPage(pageNum);
    }
    document.getElementById('next').addEventListener('click', onNextPage);
  
    /**
     * Asynchronously downloads PDF.
     */
    var loadingTask = pdfjsLib.getDocument(url);
    loadingTask.promise.then(function(pdfDoc_) {
      pdfDoc = pdfDoc_;
      document.getElementById('page_count').textContent = pdfDoc.numPages;
  
      // Initial/first page rendering
      renderPage(pageNum);
    });
  </script>
@endsection