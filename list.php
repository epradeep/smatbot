<?php
   error_reporting(0);
   include_once("DBConnections/Connections.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include_once("title.php"); ?>
	</head>
    <body data-ng-cloak data-ng-app="AppDataModule" data-ng-controller="AppDataController" data-ng-init="GetDetailsList()">
        <div class="container mt-5 mb-5">
		    <div class="row">
			    <div class="col-sm-12 col-md-12 col-lg-12">
			        <h2>List Details</h2>
				</div>
			</div>
            <div class="row pt-4">
			    <div class="col-sm-12 col-md-12 col-lg-12">
					<div class="table-responsive">
						<table class="table table-bordered">
						  <thead>
							<tr>
							  <th>S.No</th>
							  <th>Name</th>
							  <th>Email</th>
							</tr>
						  </thead>
						  <tbody>
							<tr ng-repeat="Details in DetailsArray">
							  <td data-title="Sl.No">{{$index+1}}</td>
							  <td data-title="Name">{{Details.Name}}</td>
							  <td data-title="Email">{{Details.Email}}</td>
							</tr>
							
						  </tbody>
						</table>
					</div>
				</div>
		    </div>
	    </div>

	</body>
</html>