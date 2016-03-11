var app = angular.module("intraApp", []);

app.controller("intraCtrl", function($scope)
{
   $scope.current = null;
   $scope.projects = [];

   $scope.setCurrent = function(nc)
   {
      $scope.current = nc;
   }

   var request = new XMLHttpRequest();

   request.onload = function()
   {
      if (request.status >= 200 && request.status < 400)
      {
         console.log(request.status);
         $scope.projects = JSON.parse(request.responseText).projects;
      }
   }
   request.open("GET", "projects/all_projects", true);
   request.send();

//    $scope.projects = [
//       {
//          id: 34834208,
//          name: "Un super projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un autre projet",
//          main_picture: "chat.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un 3e projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       },
//       {
//          id: 34834208,
//          name: "Un quatrieme projet",
//          main_picture: "chien.jpg",
//          description: "Un super projet de la mort",
//          short_description: "projet",
//          owner: "titi"
//       }
//    ]
});
