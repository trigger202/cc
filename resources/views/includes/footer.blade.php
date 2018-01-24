

<div id="copyright text-right">© Copyright 2013 Nichibo Japan Trading and partners </div>

	<script type="text/javascript">

		$('.handle').click( function(){

				$('nav ul').toggleClass('showing');

		});

	</script>



<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>





<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable( {   "lengthMenu": [[25, 50, 100, -1], [ 25, 50,100, "All"]],

		dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
        ]
     });

} );



$('div.alert').not('.alert-important').delay(5000).fadeOut(550);



</script>