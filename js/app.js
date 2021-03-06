(function() {
	  var app = angular.module('securityApp', []);
	  app.controller('MainController', function(){
		  
	  });
	  app.controller ('LoginController', ['$http','requestService', function($http, requestService){
		  var self = this;
		  var formData = {
			firstname: "default",
			lastname:"default",
			username:"default",
			passwrd:"default",
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
				requestService( data).success(function(){
					console.log("success");
				});
			};
			
			self.init = function(){
			};

			self.init();
	  }]);
	  
	  app.factory('requestService', function($http){
		  var factory = {};
		  factory.loginRequest = function(data){
				var url = "logingRequest/data"; 
				return $http({  method: 'GET',  url: '/url'});
		  };
		  
		  return factory;
	  });
  })();
