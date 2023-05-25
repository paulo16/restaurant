<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plat;
use App\Models\Category;
use App\Models\Restaurant;

class PlatController extends Controller
{
  public function index()
  {
    return view("backend.plats.list");
  }

  public function create()
  {
    $categories = Category::all();
    $restaurants = Restaurant::all();
    return view("backend.plats.add", compact('categories', 'restaurants'));
  }

  public function store(Request $request)
  {
    // Valider les données du formulaire
    $request->validate([
      'nom' => 'required',
      'description' => 'required',
      'prix' => 'required',
      'categorie_id' => 'nullable|exists:categories,id'
      // Ajouter d'autres validations si nécessaire
    ]);

    // Créer un nouveau plat
    $plat = new Plat();
    $plat->nom = $request->nom;
    $plat->description = $request->description;
    $plat->prix = $request->prix;
    $plat->categorie_id = $request->categorie_id;
    $plat->restaurant_id = $request->restaurant_id;
    // Ajouter d'autres champs si nécessaire

    // Rediriger vers la liste des plats avec un message de succès
    return $plat->save() ? redirect()->route('plat.index') : redirect()->route('plat.create');
  }

  public function edit($id)
  {
    $plat = Plat::find($id);
    $categories = Category::all();
    $restaurants = Restaurant::all();
    return view('backend.plats.edit', compact('plat', 'categories', 'restaurants'));
  }

  public function update(Request $request, $id)
  {
    // Valider les données du formulaire
    $request->validate([
      'nom' => 'required',
      'description' => 'required',
      'prix' => 'required',
      'categorie_id' => 'nullable|exists:categories,id',
      'restaurant_id' => 'required|exists:restaurants,id',
      // Ajouter d'autres validations si nécessaire
    ]);

    // Trouver le plat à mettre à jour
    $plat = Plat::find($id);
    $plat->nom = $request->nom;
    $plat->description = $request->description;
    $plat->prix = $request->prix;
    $plat->categorie_id = $request->categorie_id;
    $plat->restaurant_id = $request->restaurant_id;
    // Mettre à jour d'autres champs si nécessaire

    // Enregistrer les modifications dans la base de données
    $plat->save();

    // Rediriger vers la liste des plats avec un message de succès
    return redirect()->route('plat.index')->with('success', 'Le plat a été mis à jour avec succès.');
  }

  public function destroy($id)
  {
    // Trouver le plat à supprimer
    $plat = Plat::find($id);

    // Supprimer le plat de la base de données
    return $plat->delete();
  }


  public function delete(Request $request, $id)
  {
    return response()->json($this->destroy($id));
  }

  public function data(Request $request)
  {
    $plats = \DB::table('plats')->select([
      'plats.id as id',
      'plats.nom as nom',
      'plats.prix as prix',
      'plats.description as description',
      'categories.nom as categorie',
      'plats.created_at as created_at'
    ])->leftJoin('categories', 'categories.id', '=', 'plats.categorie_id');
    ;

    $datatables = \DataTables::of($plats)
      ->addColumn('action', function ($model) {
        $edit = route('plat.edit', $model->id);
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
        $query->where('plats.nom', 'like', "%" . $keyword . "%");
      });

      $datatables->filterColumn('created_at', function ($query, $keyword) {
        $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
      });
    }

    return $datatables->make(true);
  }
}