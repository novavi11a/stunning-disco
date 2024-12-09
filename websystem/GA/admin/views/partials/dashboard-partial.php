<?php

$query = 'SELECT * FROM items WHERE status = "Active" ORDER BY score DESC limit 10';
$itemRow = query_row($query);

$query = "SELECT DATE_FORMAT(timestamp, '%Y-%m-%d') AS day, SUM(amount) AS total_sale
	FROM orders
	GROUP BY day;";
$itemRowDate = query_row($query);

$query = 'SELECT * FROM users WHERE status = "Active"';
$activeAcc = query_row($query);

$query = 'SELECT * FROM users WHERE status = "Archived"';
$archiveAcc = query_row($query);


$totalSale = 0;

foreach ($itemRowDate as $dated) {
	$totalSale += $dated['total_sale'];
}


?>

<div class="row">

<div class="card m-3" style="width: 18rem;">
  <img class="card-img-top" src="../../../assets/img/thumbnail/userThumb.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Accounts</h5>
    <p class="card-text">Number of ACTIVE Accounts: <?=count($activeAcc)?></p>
	<p class="card-text">Number of Archived Accounts: <?=count($archiveAcc)?></p>
    <a href="../views/users.php" class="btn btn-primary">Manage Users</a>
  </div>
</div>

<?php if(!empty($itemRow)){?>

<div class="card m-3" style="width: 18rem;">
  <img class="card-img-top" src="../<?=$itemRow[0]['fileLoc']?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Best Seller</h5>
    <p class="card-text"><?=$itemRow[0]['name']?></p>
	<p class="card-text"><?=$itemRow[0]['description']?></p>
    <a href="../views/inventory.php" class="btn btn-primary">Manage Items</a>
  </div>
</div>


<?php } else {?>

	<div class="card m-3" style="width: 18rem;">
  <img class="card-img-top" src="../../../assets/img/thumbnail/itemThumb.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Best Seller</h5>
    <p class="card-text">No Items</p>
    <a href="../views/inventory.php" class="btn btn-primary">Manage Items</a>
  </div>
</div>

<?php } ?>

<div class="card m-3" style="width: 18rem;">
  <img class="card-img-top" src="../../../assets/img/thumbnail/salesThumb.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Total Sales</h5>
    <p class="card-text">Php <?=$totalSale?></p>
    <a href="../views/orders.php" class="btn btn-primary">Manage Orders</a>
  </div>
</div>

</div>




<div class="row">
<div id="chartContainer2" style="height: 300px; width: 50%;"></div>
<div id="chartContainer" style="height: 300px; width: 50%;"></div>
</div>




<script>
	window.onload = function() {

		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2", // "light1", "light2", "dark1", "dark2"
			title: {
				text: "Item Sell Chart"
			},
			axisY: {
				title: "Sell Count"
			},
			data: [{
				type: "column",
				showInLegend: false,
				legendMarkerColor: "grey",
				//legendText: "MMbbl = one million barrels",
				dataPoints: [
					<?php

					for ($i = 0; $i < count($itemRow); $i++) {

						echo '{ y: ' . $itemRow[$i]['score'] . ', label: "' . $itemRow[$i]['name'] . '" },';
					}

					?>

				]
			}]
		});
		chart.render();

		var chart2 = new CanvasJS.Chart("chartContainer2", {
			animationEnabled: true,
			theme: "light2",
			title: {
				text: "Total Sale"
			},
			axisX: {
				valueFormatString: "DD MMM",
				crosshair: {
					enabled: true,
					snapToDataPoint: true
				}
			},
			axisY: {
				title: "Sales",
				includeZero: true,
				crosshair: {
					enabled: true
				}
			},
			toolTip: {
				shared: true
			},
			legend: {
				cursor: "pointer",
				verticalAlign: "bottom",
				horizontalAlign: "left",
				dockInsidePlotArea: true,
				itemclick: toogleDataSeries
			},
			data: [{
				type: "spline",
				showInLegend: true,
				name: "Total Sales",
				markerType: "circle",
				xValueFormatString: "DD MMM, YYYY",
				color: "#F08080",
				dataPoints: [
					<?php

					for ($i = 0; $i < count($itemRowDate); $i++) {

						//{ x: new Date(2017, 0, 3), y: 650 },

						$sql_timestamp = $itemRowDate[$i]['day']; // Example SQL timestamp
						$unix_timestamp = strtotime($sql_timestamp);
						$date_array = getdate($unix_timestamp);



						echo '{ x: new Date(' . $date_array['year'] . ', ' . $date_array['mon'] - 1 . ', ' . $date_array['mday'] . '), y: ' . $itemRowDate[$i]['total_sale'] . ' },';
					}

					?>



				]
			}]
		});
		chart2.render();

		function toogleDataSeries(e) {
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			} else {
				e.dataSeries.visible = true;
			}
			chart2.render();
		}

	}
</script>

