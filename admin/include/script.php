<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script> 

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<script src="dist/js/footer.js"></script>
<!-- Page specific script -->

<script type="text/javascript">
  $('#myModal').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});
</script>

<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
      {
        extend: 'copy',
        exportOptions: {
          columns: ':visible' 
        }
      }, 
      {
        extend: 'csv',
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'excel',
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'pdf',
        exportOptions: {
          columns: ':visible'
        }
      },
      {
        extend: 'print',
        exportOptions: {
          columns: ':visible'
        }
      }, "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> 

<script>
  $(function(){
  var url = window.location; 
  // if(window.location.hash === "#TradingRiskManagement"){
  //  var match = window.location.href.match(/^[^#]+#([^?]*)\??(.*)/);
  //  var url = match[0].split('#')[0]; 
  // } 
  // for sidebar menu entirely but not cover treeview
  $('ul.nav a').filter(function() {
    return this.href != url;
  }).removeClass('active');

  // for sidebar menu entirely but not cover treeview
  $('ul.nav a').filter(function() {
    return this.href == url;
  }).addClass('active');
 
  // for treeview
  $('ul.nav-treeview a').filter(function() {
      return this.href == url;
  }).parentsUntil(".nav-sidebar > .nav-treeview").addClass('menu-open').prev('a').addClass('active');
})
</script> 

<script>
const log = console.log;
const areaSelect = document.querySelector(`[id="User"]`);
const sb = document.querySelector('[id="list"]');

areaSelect.addEventListener(`change`, (e) => {
  // log(`e.target`, e.target);
  const select = e.target;
  const value = select.value;
  const desc = select.selectedOptions[0].text; 
  // create a new option
  const option = new Option(desc); 
  // add it to the list
  log(`option desc`, value, desc);
  sb.add(option); 

  // remove selected option
    btnRemove.onclick = (e) => {
        e.preventDefault();

        // save the selected option
        let selected = [];

        for (let i = 0; i < sb.options.length; i++) {
            selected[i] = sb.options[i].selected;
        }

        // remove all selected option
        let index = sb.options.length;
        while (index--) {
            if (selected[index]) {
                sb.remove(index);
            }
        }
    };
});
</script>

<script>
$("#SV").click(function(){ 
  $("select > option").prop("selected","selected"); 
});
</script>

<script>
function createCookie(name, value, days) { 
  var expires; 
  
  if (days) { 
    var date = new Date(); 
    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
    expires = "; expires=" + date.toGMTString(); 
  } 
  else { 
    expires = ""; 
  } 
  
  document.cookie = escape(name) + "=" + 
    escape(value) + expires + "; path=/"; 
} 

</script>

<script>
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return typeof sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};
</script> 
 