<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use App\User;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
	public function __construct()
	{
		$this->middleware('epitech.auth')->only('postComment');
	}

	public function getArticlesHome()
	{
		$articles = Article::orderBy('updated_at', 'desc')->paginate(7);

		return (view('pages.articles', compact('articles')));
	}

	public function getArticle($id, $name)
	{
		meta('name', $name);

		$article = Article::findOrFail($id);
		return (view('pages.article', compact('article')));
	}

	public function postComment(Request $request, $id)
	{
		$this->validate($request, [
			'comment' => 'required'
		]);
		$user = User::where('login', '=', intra()->getLogin())->get()->last();

		$comment = new Comment;
		$comment->content = $request->comment;
		$comment->author_id = $user->id;
		$comment->article_id = $id;
		$comment->save();
		return (redirect()->back()->with('successNotification', 'Votre commentaire a été correctement posté !'));
	}

	public function patchComment(Request $request, $id)
	{
		$this->validate($request, [
			'comment' => 'required'
		]);
		$comment = Comment::find($id);
		if ($comment->content == $request->comment)
			return (redirect()->back()->with('infoNotification', 'Votre commentaire a n\' a pas changé.'));
		$comment->content = $request->comment;
		$comment->save();

		return (redirect()->back()->with('successNotification', 'Votre commentaire a été édité avec succès !'));
	}

	public function deleteComment($id)
	{
		$comment = Comment::find($id);
		$comment->delete();
		return (redirect()->back()->with('successNotification', 'Votre commentaire a été supprimé avec succès !'));
	}
}