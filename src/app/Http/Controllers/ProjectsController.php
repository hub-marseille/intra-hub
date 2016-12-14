<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProjectsController extends Controller
{
	public function getProjectsHome()
	{
		return (view('pages.projects'));
	}
}
