<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use LdapRecord\Models\OpenLDAP\User as OpenLDAPUser;

class UserController extends Controller
{
  public function index()
  {
    $users = User::whereIn('statusid', [0, 1])->orderBy('statusid', 'desc')->orderBy('created_at', 'desc')->get();

    return view('admin.users.index', compact('users'));
  }

  public function create()
  {
    return $this->edit(new User());
  }

  public function store(Request $request)
  {
    User::create($request->all());

    return redirect(route('admin.users.index'))->with('successMessage', 'Record has been created successfully.');
  }

  public function edit(User $user)
  {
    return view('admin.users.form', compact('user'));
  }

  public function update(Request $request, User $user)
  {
    $user->update($request->all());

    return back()->with('successMessage', 'Record has been updated successfully.');
  }

  public function createLdap()
  {
    return view('admin.users.create_ldap');
  }

  public function sendUsername(Request $request)
  {
    return redirect(route('admin.users.import-ldap-form', $request->input('username')));
  }

  public function importLdapForm($uid)
  {
    $ldap = OpenLDAPUser::where('uid', $uid)->first();

    if ($ldap) {
      return view('admin.users.import_ldap')->with(compact('ldap'));
    } else {
      return redirect(route('admin.users.create-ldap'))->withErrors(['Username not found.']);
    }
  }

  public function importLdap(Request $request)
  {
    Artisan::call('ldap:import', [
      'provider' => 'ldap',
      'user' => $request->input('username'),
      '--no-interaction',
    ]);

    $user = User::where('email', $request->input('email'))->first();

    $user->update($request->all());
    $user->save();

    return redirect(route('admin.users.index'))->with([
      'successMessage' => __('Record has been added successfully.'),
    ]);
  }

  public function destroy(User $user)
  {
    $user->delete();

    Session::flash('successMessage', 'Record has been deleted successfully.');

    return response()->noContent();
  }
}
