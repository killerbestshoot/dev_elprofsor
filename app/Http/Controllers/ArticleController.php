<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        // Récupérer tous les articles de la base de données
        $articles = Article::all();

        // Passer les articles à la vue 'articles'
        return view('articles', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        //
        return view('createArticle');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'category' => 'required',
            'tags'=>'required',
            // Ajoutez d'autres règles de validation en fonction de vos besoins
        ]);

        // Récupération de l'utilisateur actuel
//        $user = Auth::user();
        if (auth()->check()) {
            // Utilisateur authentifié
            // Création d'un nouvel article avec les données du formulaire
            $article = Article::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'url' => $this->generateUniqueURL($request->input('title')), // Assurez-vous d'implémenter une fonction pour générer une URL unique
                'author' => $request->input('author'), // Supposons que le nom de l'utilisateur soit utilisé comme auteur
                'category' => $request->input('category'),
                'tags' => $request->input('tags'), // Assurez-vous que 'tags' est un tableau si votre modèle le nécessite
                'published_at' => now(), // Utilise la date et l'heure actuelles pour la publication
                // Ajoutez d'autres champs de votre modèle en fonction de vos besoins
            ]);


            // Sauvegarde de l'article dans la base de données
            $article->save();
        }
        // Redirection vers la page d'affichage de l'article nouvellement créé
        return redirect()->route('article.show', ['title' => $article->title])->with('success', 'Article créé avec succès');
    }
    protected function generateUniqueURL($title)
    {
  $slug = Str::slug($title);

    // Vérifie si le slug existe déjà
    $count = Article::where('url', $slug)->count();

    // Si le slug existe déjà, ajoute un suffixe numérique pour le rendre unique
    if ($count > 0) {
        $slug = Str::slug($title) . '-' . ($count + 1);
    }
        return 'http://localhost:8000/article/' . $slug;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $title): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        // Récupérer l'article en fonction de l'ID
        $article = Article::where('title', $title)->first();

        // Vérifier si l'article a été trouvé
        if ($article) {
            // Passer les données de l'article à la vue 'article.show' (ajustez le nom de la vue selon votre structure)
            return view('articleshow', ['article' => $article]);
        } else {
            // Gérer le cas où l'article n'est pas trouvé (redirection, message d'erreur, etc.)
            return redirect()->route('index')->with('error', 'Article non trouvé');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $title)
    {
        //
    }
}
