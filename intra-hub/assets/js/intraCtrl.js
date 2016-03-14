var app = angular.module("intraApp", []);

app.controller("intraCtrl", function($scope)
{
   $scope.current = null;
   $scope.projects = [];

   var request = new XMLHttpRequest();

   $scope.setCurrent = function(nc)
   {
      $scope.current = nc;
   }
   request.onload = function()
   {
      var ret;

      if (request.status >= 200 && request.status < 400)
      {
         ret = JSON.parse(request.responseText);
         if (ret.success)
         {
            $scope.projects = ret.projects;
            $scope.$apply();
         }
      }
   }
   request.open("GET", "index.php/projects/all_projects", true);
   request.send();
});
