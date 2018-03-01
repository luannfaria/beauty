<section id="main-content">
  <section class="wrapper">

 <link rel="stylesheet" href="https://jquery.ui.timepicker.css?v=0.3.3" type="text/css" />
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <script src="https://fgelinas.com/code/timepicker/jquery.ui.timepicker.js?v=0.3.3"></script>


        <script>

        $(document).on('show.bs.modal', '.modal', function (event) {
           var zIndex = 1040 + (10 * $('.modal:visible').length);
           $(this).css('z-index', zIndex);
           setTimeout(function() {
               $('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
           }, 0);
        });
        </script>






    <div class="row">
      <div class="col-lg-12">
        <h3 class="page-header"></h3>



        <div id='calendar'></div>







      </div></div>

      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="travar" class="modal fade">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
              <h4 class="modal-title">TRAVAR HORARIO</h4>
            </div>
            <div class="modal-body">


            </div>
          </div>
        </div>
      </div>




  

    </section>

  </section>
