'use strict';

// Declare app level module which depends on views, and components
angular.module('myApp.carousel', ['ui.bootstrap']);

function CarouselDemoCtrl($scope){
	  $scope.myInterval = 3000;
	  $scope.slides = [
	    {
	      image: 'http://lorempixel.com/400/200/'
	    },
	    {
	      image: 'http://lorempixel.com/400/200/food'
	    },
	    {
	      image: 'http://lorempixel.com/400/200/sports'
	    },
	    {
	      image: 'http://lorempixel.com/400/200/people'
	    }
	  ];
	}
