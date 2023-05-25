<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use Debugbar;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   */
  public function index()
  {
    return view("backend.users.list");
  }

  /**
   * Show the form for creating a new resource.
   *
   */
  public function create()
  {
    return view("backend.users.add");
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
      'email' => 'email|unique:users',
    ]);
    $user = new User();
    $user->name = $request->get('nom') ? $request->get('nom') : '';
    $user->lastname = $request->get('lastname') ? $request->get('lastname') : '';
    $user->email = $request->get('email') ? $request->get('email') : '';
    $user->password = $request->get('password') ? bcrypt($request->get('password')) : '';

    return $user->save() ? redirect()->route('user.index') : redirect()->route('user.create');
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
    $user = User::find($id);
    return view('backend.users.edit', compact('user'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   */
  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);

    $validatedData = $request->validate([
      'name' => 'required|string',
      'lastname' => 'required|string',
      'email' => 'required|email|unique:users,email,' . $id,
      'password' => 'nullable|string|min:8|confirmed',
    ]);

    $user->name = $validatedData['name'];
    $user->lastname = $validatedData['lastname'];
    $user->email = $validatedData['email'];

    if ($request->filled('password')) {
      $user->password = bcrypt($validatedData['password']);
    }

    $user->save();

    return redirect()->route('user.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   */
  public function destroy($id)
  {
    $cat = User::find($id);
    return $cat->delete();
  }

  public function delete(Request $request, $id)
  {
    return response()->json($this->destroy($id));
  }

  public function findinfo($id)
  {
    $user = User::find($id);

    return response()->json($user);
  }

  public function data(Request $request)
  {
    $users = \DB::table('users')->select([
      'users.id as id',
      'users.name as nom',
      'users.email as email',
      'users.created_at as created_at'
    ]);

    $datatables = DataTables::of($users)
      ->addColumn('action', function ($model) {


        $edit = route('user.edit', $model->id);

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
      // override users.name global search
      $datatables->filterColumn('nom', function ($query, $keyword) {
        $query->where('users.name', 'like', "%" . $keyword . "%");
      });

      $datatables->filterColumn('created_at', function ($query, $keyword) {
        $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
      });
    }
    return $datatables->make(true);
  }

}