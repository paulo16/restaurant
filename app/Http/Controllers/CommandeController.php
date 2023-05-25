<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Commande;
use App\Models\User;
use App\Models\Plat;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('backend.commandes.list');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $users = User::all();
    $plats = Plat::all();
    return view('backend.commandes.add', compact('users', 'plats'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'plat_id' => 'required|exists:plats,id',
      'user_id' => 'required|exists:users,id',
      // Ajouter d'autres validations si nécessaire
    ]);

    $commande = new Commande();
    $commande->plat_id = $request->plat_id;
    $commande->user_id = $request->user_id;
    $commande->quantite = $request->quantite;

    // Ajouter d'autres champs si nécessaire

    return $commande->save() ? redirect()->route('commande.index') : redirect()->route('commande.create');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $commande = Commande::find($id);
    return view('backend.commandes.show', compact('commande'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $commande = Commande::find($id);
    $users = User::all();
    $plats = Plat::all();
    return view('backend.commandes.edit', compact('commande', 'users', 'plats'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $commande = Commande::findOrFail($id);

    $validatedData = $request->validate([
      'plat_id' => 'required|exists:plats,id',
      'user_id' => 'required|exists:users,id',
      'quantite' => 'nullable',
      // Ajouter d'autres validations si nécessaire
    ]);

    $commande->plat_id = $validatedData['plat_id'];
    $commande->user_id = $validatedData['user_id'];
    $commande->quantite = $validatedData['quantite'];

    // Ajouter d'autres champs si nécessaire

    $commande->save();

    return redirect()->route('commande.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $commande = Commande::find($id);
    return $commande->delete();
  }

  /**
   * Get data for DataTables.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function data(Request $request)
  {
    $commandes = DB::table('commandes')->select([
      'commandes.id as id',
      'plats.nom as plat',
      'plats.prix as prix',
      'users.name as utilisateur',
      'commandes.quantite as quantite',
      'commandes.created_at as created_at'
    ])->leftJoin('plats', 'plats.id', '=', 'commandes.plat_id')
      ->leftJoin('users', 'users.id', '=', 'commandes.user_id');

    $datatables = DataTables::of($commandes)
      ->addColumn('action', function ($model) {
        $edit = route('commande.edit', $model->id);
        $url_edit = '<a type="button" href="' . $edit . '" class="btn btn-inverse-success btn-fw">Modifier</a>';
        $delete = '<button type="button" data-id="' . $model->id . '" class="delete btn btn-inverse-danger btn-fw">Supprimer</button>';
        $action = '<div>' . $url_edit . '&nbsp;&nbsp;&nbsp;' . $delete . '</div>';

        return $action;
      })
      ->editColumn('created_at', function ($model) {
        return $model->created_at ? with(new Carbon($model->created_at))->format('d/m/Y') : '';
      });

    // Filtres de recherche globale
    if ($keyword = $request->get('search')['value']) {
      $datatables->filterColumn('plat_id', function ($query, $keyword) {
        $query->where('commandes.plat_id', 'like', "%" . $keyword . "%");
      });

      $datatables->filterColumn('user_id', function ($query, $keyword) {
        $query->where('commandes.user_id', 'like', "%" . $keyword . "%");
      });

      $datatables->filterColumn('quantite', function ($query, $keyword) {
        $query->where('commandes.quantite', 'like', "%" . $keyword . "%");
      });

      $datatables->filterColumn('created_at', function ($query, $keyword) {
        $query->whereRaw("DATE_FORMAT(commandes.created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
      });
    }

    return $datatables->make(true);
  }
}