<?php

namespace App\Http\Controllers;

use App\Article;
use App\Project;
use Twitter;

class HomeController extends Controller
{
	/* TODO: Change Twitter app */
	private $consumerKey = 'lE1wup7lqaB7dEXyC7Zvph037';
	private $consumerSecret = 'bzXaFub5X4FFnoUDfKboEyMa8zbqb1TQPLnD0Pe4pSG4ig0gNH';
	private $accessToken = '528636507-9GTridis2GgAUdmuaRI3dlY71VnWtMINdZD0CBLe';
	private $accessTokenSecret = '6wUjj3E1SDk58GIx4ifZ0MLdwJvxO7r9fYhkG0Vn0Pars';

	public function getHomePage()
	{
		$articles = Article::orderBy('updated_at', 'desc')->take(3)->get();
		$projects = Project::where('status', '=', 'displayed')->orderBy('updated_at', 'desc')->get();
		$shortArticles = true;

		$twitter = new Twitter($this->consumerKey, $this->consumerSecret, $this->accessToken, $this->accessTokenSecret);
		$tweets = $twitter->load(Twitter::ME, 6);
		$twitterUser = 'EpitechInnoMRS';

		return (view('pages.home', compact('articles', 'projects', 'shortArticles', 'tweets', 'twitterUser')));
	}
}
