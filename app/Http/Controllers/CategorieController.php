<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategorieController extends Controller
{
  /**
   * Affiche la liste des catégories.
   *
   * @return \Illuminate\View\View
   */
  public function index()
  {
    return view("backend.categories.list");
  }

  /**
   * Affiche le formulaire de création d'une nouvelle catégorie.
   *
   * @return \Illuminate\View\View
   */
  public function create()
  {
    return view("backend.categories.add");
  }

  /**
   * Enregistre une nouvelle catégorie dans la base de données.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'nom' => 'required',
    ]);

    $category = new Category();
    $category->nom = $request->get('nom');
    $category->description = $request->get('description');

    return $category->save() ? redirect()->route('categorie.index') : redirect()->route('categorie.create');
  }

  /**
   * Affiche le formulaire d'édition d'une catégorie existante.
   *
   * @param  int  $id
   * @return \Illuminate\View\View
   */
  public function edit($id)
  {
    $category = Category::find($id);
    return view('backend.categories.edit', compact('category'));
  }

  /**
   * Met à jour une catégorie dans la base de données.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\RedirectResponse
   */
  public function update(Request $request, $id)
  {
    $category = Category::findOrFail($id);

    $validatedData = $request->validate([
      'nom' => 'required|string',
    ]);

    $category->nom = $validatedData['nom'];

    $category->save();

    return redirect()->route('categorie.index');
  }

  /**
   * Supprime une catégorie de la base de données.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $category = Category::find($id);
    return $category->delete();
  }


  public function delete(Request $request, $id)
  {
    return response()->json($this->destroy($id));
  }

  /**
   * Retourne les informations d'une catégorie en JSON.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function findinfo($id)
  {
    $category = Category::find($id);

    return response()->json($category);
  }

  /**
   * Retourne les données des catégories pour le DataTable.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function data(Request $request)
  {
    $categories = \DB::table('categories')->select([
      'categories.id as id',
      'categories.nom as nom',
      'categories.description as description',
      'categories.created_at as created_at'
    ]);

    $datatables = \DataTables::of($categories)
      ->addColumn('action', function ($model) {
        $edit = route('categorie.edit', $model->id);
        $url_edit = '<a type="button" href=":url" class="btn btn-inverse-success btn-fw">Modifier</a>';
        $delete = '<button type="button" data-id=":id" class="delete btn btn-inverse-danger btn-fw">Supprimer</button>';
        $edit = str_replace(":url", $edit, $url_edit);
        $del = str_replace(":id", $model->id, $delete);
        $action = '<div>' . $edit . '&nbsp;&nbsp;&nbsp;' . $del . '</div>';

        return $action;
      })
      ->editColumn('created_at', function ($model) {
        return $model->created_at ? with(new \Carbon\Carbon($model->created_at))->format('d/m/Y') : '';
      });

    // Filtres
    // Recherche globale
    if ($keyword = $request->get('search')['value']) {
      $datatables->filterColumn('nom', function ($query, $keyword) {
        $query->where('categories.nom', 'like', "%" . $keyword . "%");
      });

      $datatables->filterColumn('created_at', function ($query, $keyword) {
        $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
      });
    }

    return $datatables->make(true);
  }
}