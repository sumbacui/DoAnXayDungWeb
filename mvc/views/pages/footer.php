</div>
<!-- /#wrapper -->

<!--Xóa message nếu load lại trang-->
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['error']); ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/1.1.3/metisMenu.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="./public/js/script.js"></script>
<script>
    // Xóa message sau 1 giây
    setTimeout(function() {
        let alert = document.querySelector(".alert");
        alert.remove();
    }, 1000);

</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
      // order
      var arr = [['Ngày', 'Doanh thu']];
      var orders = JSON.parse(document.getElementById("data").value);
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      for(x of orders){
        arr.push([x.order_day,parseFloat(x.total_price)])
      }  
      function drawChart() {

        var data = google.visualization.arrayToDataTable(
           arr
        );

        var options = {
          title: 'Thống kê doanh thu theo ngày'
        };

        var chart = new google.visualization.PieChart(document.getElementById('order'));

        chart.draw(data, options);
      }
</script>
<script src="./public/ckeditor/ckeditor.js"></script>
<script src="./public/ckfinder/ckfinder.js"></script>
<script>
    var editor = CKEDITOR.replace('description');
    CKFinder.setupCKEditor(editor);
</script>
</body>
</html>
