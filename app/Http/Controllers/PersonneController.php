<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Personne;
use Debugbar;

class PersonneController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   */
  public function index()
  {
    return view("backend.personnes.list");
  }

  /**
   * Show the form for creating a new resource.
   *
   */
  public function create()
  {
    return view("backend.personnes.add");
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
      'nom' => 'required',
      'email' => 'email|unique:personnes',
    ]);
    $personne = new Personne();
    $personne->nom = $request->get('nom') ? $request->get('nom') : '';
    $personne->prenom = $request->get('prenom') ? $request->get('prenom') : '';
    $personne->email = $request->get('email') ? $request->get('email') : '';

    return $personne->save() ? redirect()->route('personne.index') : redirect()->route('personne.create');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   */
  public function edit($id)
  {
    $personne = Personne::find($id);
    return view('backend.personnes.edit', compact('personne'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   */
  public function update(Request $request, $id)
  {
    $personne = Personne::findOrFail($id);

    $validatedData = $request->validate([
      'nom' => 'required|string',
      'prenom' => 'required|string',
      'email' => 'required|email|unique:personnes,email,' . $id,
    ]);

    $personne->nom = $validatedData['nom'];
    $personne->prenom = $validatedData['prenom'];
    $personne->email = $validatedData['email'];

    $personne->save();

    return redirect()->route('personne.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   */
  public function destroy($id)
  {
    $cat = Personne::find($id);
    return $cat->delete();
  }

  public function delete(Request $request, $id)
  {
    return response()->json($this->destroy($id));
  }

  public function findinfo($id)
  {
    $personne = Personne::find($id);

    return response()->json($personne);
  }

  public function data(Request $request)
  {
    $personnes = \DB::table('personnes')->select([
      'personnes.id as id',
      'personnes.nom as nom',
      'personnes.prenom as prenom',
      'personnes.email as email',
      'personnes.created_at as created_at'
    ]);

    $datatables = DataTables::of($personnes)
      ->addColumn('action', function ($model) {


        $edit = route('personne.edit', $model->id);

        $url_edit = '<a type="button" href=":url" class="btn btn-inverse-success btn-fw">Modifier</a>';
        $delete = '<button type="button" data-id=":id" class="delete btn btn-inverse-danger btn-fw">Supprimer</button>';
        $edit = str_replace(":url", $edit, $url_edit);
        $del = str_replace(":id", $model->id, $delete);

        //$action = '<div class="hidden-sm hidden-xs action-buttons">&nbsp;' . $edit . '&nbsp;' . $del . '</div>';
        $action = '<div>' . $edit . '&nbsp;&nbsp;&nbsp;' . $del . '</div>';

        return $action;
      })->editColumn('created_at', function ($model) {
      return $model->created_at ? with(new Carbon($model->created_at))->format('d/m/Y') : '';
    });
    // les filtres 
    // Global search function
    if ($keyword = $request->get('search')['value']) {
      //Debugbar::info($keyword);
      // override personnes.name global search
      $datatables->filterColumn('nom', function ($query, $keyword) {
        $query->where('personnes.nom', 'like', "%" . $keyword . "%");
      });

      $datatables->filterColumn('created_at', function ($query, $keyword) {
        $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
      });
    }
    return $datatables->make(true);
  }

}