<?php
$this->load->view('includes/header');
?>

<?php
$this->load->view('includes/sidebar');
?>
<style>
    #piechart {
  
}
</style>

<!-- partial -->
<div id="content" role="main" class="main">
    <div class="content container-fluid">
        <div class="page-header">
    <!--7 Days Reminder Notification -->
    
    <div class="alert alert-danger alert-dismissible fade show col-md-12 text-center mt-4" id="resuldvd" style="font-family: auto;  font-size: 19px; display:none;" role="alert">
          <strong id="result"></strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            <nav aria-label="breadcrumb">

            </nav>
            <!-- Icon Cards-->
      <div class="row">
           <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo $smtp[0]['totalSmtp'] ?> Smtp!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5"><?php echo $subjects[0]['totalSubject'] ?> Subjects!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><?php echo $recipiant[0]['totalRecipiant'] ?> Recipient!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5"><?php echo $bodyline[0]['totalbodyline'] ?> Body line!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-support"></i>
              </div>
              <div class="mr-5"><?php echo $attch[0]['totalAttch'] ?> Attechment!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-support"></i>
                    </div>
                <div class="mr-5"><?php echo $senders[0]['totalSenders'] ?> Senders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
        
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-support"></i>
                    </div>
                <div class="mr-5"><?php echo $html[0]['totalHtml'] ?> Html!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-support"></i>
                    </div>
                <div class="mr-5"><?php echo $invoice[0]['totalInvoice'] ?> Invoice!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
        </div>
      </div>
      
        </div>
        <div class='row'>
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='row'>
                            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                        </div>
                       
                    </div>
                </div>
            </div> 
            <div class='col-md-6'>
                <div class='card'>
                    <div class='card-body'>
                        <div class='row'>
                            <div id="chartContainers" style="height: 300px; width: 100%;"></div>
                        </div>
                       
                    </div>
                </div>
            </div> 
        </div>
        
            <!--<div class="row">-->
            <!--    <div class="col-md-6">-->
            <!--        <table class="donutchart">-->
            <!--            <tr><td>1</td><td><?php echo $grafh['faildData'] ?></td><td>red</td><td>Failed</td></tr>-->
            <!--            <tr><td>2</td><td><?php echo $grafh['successData'] ?></td><td>blue</td><td>Success</td></tr>-->
                        
            <!--        </table>-->
            <!--    </div>-->
            <!--    <div class="col-md-6">-->
            <!--        <table class="mailTracking">-->
            <!--            <tr><td>1</td><td><?php echo $mailUnSeen ?></td><td>red</td><td>Unseen</td></tr>-->
            <!--            <tr><td>2</td><td><?php echo $mailSeen ?></td><td>blue</td><td>Seen</td></tr>-->
                        
            <!--        </table>-->
            <!--    </div>-->
            <!--</div>-->
  

<!--<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>-->
<!--<script src="<?php echo base_url('assets/plugin/jquery.chart.js') ?>"></script>-->

<script src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>

<script>
grafs();
function grafs () {
// alert();
var options = {
	animationEnabled: true,
	title: {
		text: "Mailer Status"
	},
	data: [{
		type: "doughnut",
		innerRadius: "40%",
		showInLegend: true,
		legendText: "{label}",
		indexLabel: "{label}: #percent%",
		dataPoints: [
			{ label: "Seccess", y: "<?php echo $grafh['successData']  ?>" },
			{ label: "Failed", y: "<?php echo $grafh['faildData']  ?>" }
		
		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

console.log("mailseen status ::: ",<?php echo $mailSeen  ?>);
console.log("mailseen status ::: ",<?php echo $mailUnSeen  ?>);
var options = {
	animationEnabled: true,
	title: {
		text: "Mails Tracking"
	},
	data: [{
		type: "doughnut",
		innerRadius: "40%",
		showInLegend: true,
		legendText: "{label}",
		indexLabel: "{label}: #percent%",
		dataPoints: [
			{ label: "Seen", y: "<?php echo $mailSeen  ?>" },
			{ label: "Unseen", y: "<?php echo $mailUnSeen  ?>" }
		
		]
	}]
};

$("#chartContainers").CanvasJSChart(options);

}
</script>
    <script>
        getGraf();
        var dataPoints = "";
        function getGraf() {
            // $(".donutchart").donutChart({
            //     width: 450,
            //     height: 300,
            //     legendSizePadding: 0.04,
            //     label: "Mailer Grafh",
            //     hasBorder: true
            // })
            
            // $(".mailTracking").donutChart({
            //     width: 450,
            //     height: 300,
            //     legendSizePadding: 0.04,
            //     label: "Maile Traking",
            //     hasBorder: true
            // })

    //     $.ajax({
    //         type:"post",
    //         url:"<?php echo base_url('CompaignController/getData') ?>",
    //         data:{},
    //         async:false,
    //     }).done(function(data){
    //         dataPoints = JSON.parse(data);
    //     });

    //     const nameOfMonth = new Date().toLocaleString('default', {month: 'long'});
    //     const currentMonth = new Date().getFullYear();
    //     var chart = new CanvasJS.Chart("chartContainer", {
    //         animationEnabled: true,
    //         title: {
    //             text: "Mailer Status"
    //         },
    //         subtitles: [{
    //             text:  nameOfMonth+ " "+currentMonth
    //         }],
    //         data: [{
    //             type: "pie",
    //             yValueFormatString: "#,##0.00\"%\"",
    //             indexLabel: "{label} ({y})",
    //             dataPoints: [
				//     { label: "Success", y: dataPoints.successData },
				//     { label: "falide", y: dataPoints.faildData }
			 //   ]
    //         }]
    //     });
    //     chart.render();
    }
    </script>
    <?php
$this->load->view('includes/footer');
?>