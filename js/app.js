(function() {
	  var app = angular.module('securityApp', []);

	  app.controller('PaperFormController', ['$http', function($http){
		var store = this;
		store.products = [];
		/*
		$http.get('./store-products.json').success(function(data){
			store.products = data;
		});
		*/
	  }]);

	  app.controller('FormController', ['$http',function($http) {
		var self = this;
		var formData = {
			firstname: "default",
			lastname:"default",
			emailaddress: "default",
			textareacontent: "default",
			gender: "default",
			member: false,
			file_profile: "default",
			file_avatar: "default"
		};

		self.save = function() {
			formData = self.form;
		};

		self.submitForm = function() {        
			formData = self.form;
			console.log(formData);
			console.log("posting data....", formData);
			//$http.post('form.php', JSON.stringify(data)).success(function(){/*success callback*/});
		};
	}]);
  })();
