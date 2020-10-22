<!DOCTYPE html>
<html lang="en">
	<head>
        <?php include_once("title.php"); ?>
	</head>
    <body data-ng-cloak data-ng-app="AppDataModule" data-ng-controller="AppDataController">
            <div class="container mt-5 mb-5">
			    <div class="row">
				    <div class="col-sm-6 col-md-6 col-lg-6">
				        <h2>Smatbot</h2>
					</div>
					<div class="col-sm-6 col-md-6 col-lg-6 text-right">
				        <a href="list.php" target="_blank" class="btn btn-success btn-md">Go to List</a>
					</div>
				</div>
				<form role="form" id="DetailsForm" name="DetailsForm"autocomplete="off" enctype="multipart/form-data" novalidate="" data-ng-submit="DetailsData(Details)">
					<div class="row pt-3">
						<div class="form-group col-sm-6 col-md-6 col-lg-6">
							<label for="name">Name <span class="require">*</span></label>
							<input type="text" class="form-control" id="name" name="name" pattern="^[a-zA-Z- .]+" maxlength="50" required data-ng-model="name" data-ng-minlength="3" data-ng-maxlength="50" required="">
							<div class="error" data-ng-show="submitted || DetailsForm.name.$dirty && DetailsForm.name.$invalid">
								<small class="error" data-ng-show="DetailsForm.name.$error.required">Name is required.</small>
								<small class="error" data-ng-show="DetailsForm.name.$error.minlength">Name is should be at least 3 characters.</small>
								<small class="error" data-ng-show="DetailsForm.name.$error.maxlength">Name is should not be greater then 50 characters.</small>
								<small class="error" data-ng-show="DetailsForm.name.$error.pattern">Name is should be alphabetic.</small>
							</div>
						</div>
						<div class="form-group col-sm-6 col-md-6 col-lg-6">
							<label for="email">Email <span class="require">*</span></label>
							<input type="email" class="form-control" id="email" name="email" pattern="^[_a-zA-Z0-9]+(\.[_a-zA-Z0-9]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,4})$" data-ng-model="email" required="">               
						    <div class="error" data-ng-show="submitted || DetailsForm.email.$dirty && DetailsForm.email.$invalid">
								<small class="error" data-ng-show="DetailsForm.email.$error.required">Email is required.</small>
								<small class="error" data-ng-show="DetailsForm.email.$error.email || DetailsForm.email.$error.pattern">Invalid Email.</small>
							</div>
						</div>
					</div>
							
					<div class="row">
					   <div class="col-md-12 col-lg-12"> 
						  <button type="submit" class="btn btn-success btn-md">Submit</button>
						    <div class="mt-3">
								<div class="alert alert-danger alert-dismissable" data-ng-show="showWarningAlert">
									<button type="button" class="close" data-ng-click="switchBool('showWarningAlert')">×</button>
									<strong>&nbsp;{{WarningAlert}}</strong>
								</div>
								<div class="alert alert-success alert-dismissable" data-ng-show="showSuccessAlert">
								  <button type="button" class="close" data-ng-click="switchBool('showSuccessAlert')">×</button>
								  <strong>&nbsp;{{SuccessAlert}}</strong>
							    </div>
							</div>
						</div>
					</div>
				</form>	
			</div>


        
		<script>
		  const scriptURL = 'https://script.google.com/macros/s/AKfycbybRsEldrN2gSA1F1WvTcRxrfiH8JXt97AFd7MFYoXAEFdW3Gg/exec'
		  const form = document.forms['DetailsForm']

		  form.addEventListener('submit', e => {
		    e.preventDefault()
		    fetch(scriptURL, { method: 'POST', body: new FormData(form)})
		      .then(response => console.log('Success!', response))
		      .catch(error => console.error('Error!', error.message))
		  })
		</script>
	</body>
</html>