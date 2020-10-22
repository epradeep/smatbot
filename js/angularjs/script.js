var AppData = angular.module("AppDataModule", [])
AppData.controller("AppDataController", function ($scope, $timeout, $http, jsonFilter)
{
		
	$scope.showSuccessAlert = false;
	$scope.showWarningAlert = false;
	
	var logResult = function (data, status, headers, config)
	{
		return data;
	};
	
	
	$scope.DetailsData = function (Details)
	{
     
        $scope.submitted = true;

		$http.post('details_process.php',{'name':$scope.name,'email':$scope.email})
		.then(function successCallback(response)
		{
			var data = response.data;

			if(data=="Success")
			{
			    $scope.submitted = false;
				$scope.SuccessAlert = "Thank for submitting";
				$scope.showSuccessAlert = true;
				$scope.showWarningAlert = false;
		
				$timeout(function () { $scope.showSuccessAlert = false;window.location.href="index.php";}, 3000);
			}

		}, function errorCallback(response) {
    		// called asynchronously if an error occurs
		    // or server returns response with an error status.
		  });   
	   
	}
	

	$scope.GetDetailsList = function()
	{	
		$http.get("load_details.php", {})
		.then(function successCallback(response)
		{
			var data = response.data;

			if(data=="NoRecords")
			{
				$scope.DetailsArray = "";
			}
			else
			{
				$scope.DetailsArray = data;
			}
		}, function errorCallback(response) {
    		// called asynchronously if an error occurs
		    // or server returns response with an error status.
		  });
		
	}
	
	
   $scope.switchBool = function (value) {
		$scope[value] = !$scope[value];
	};
	
	
});