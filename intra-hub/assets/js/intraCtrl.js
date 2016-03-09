var app = angular.module("intraApp", []);

app.controller("intraCtrl", function($scope)
{
   $scope.current = null;

   $scope.setCurrent = function(nc)
   {
      $scope.current = nc;
   }

   $scope.projects = [
      {
         id: 34834208,
         name: "Un super projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un autre projet",
         main_picture: "chat.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un 3e projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      },
      {
         id: 34834208,
         name: "Un quatrieme projet",
         main_picture: "chien.jpg",
         description: "Un super projet de la mort",
         short_description: "projet",
         owner: "titi"
      }
   ]
});
