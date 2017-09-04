<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\Admin\UserService;
use App\Models\User;
use Gate;

class UsersController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(Request $request)
    {
        abort_if (Gate::denies('permission', 'user.list'), 403, 'Unauthorized action.');
        $limit = $request->input('perPage', config('list.limit.per_page'));
        $keyword = $request->input('keyword', '');
        $sortBy = $request->input('sortBy', '');
        $this->viewData['filter'] = [
            'limit' => $limit,
            'keyword' => $keyword,
            'sortBy' => $sortBy,
            'optionsSort' => UserService::getOptionsSort(),
        ];
        $this->viewData['title'] = trans('admin/users.title');
        $this->viewData['users'] = UserService::list([
            'limit' => $limit,
            'keyword' => $keyword,
            'withTrashed' => true,
            'orderBy' => $sortBy,
        ]);

        return view('admin.users.index', $this->viewData);
    }

    public function create()
    {
        abort_if (Gate::denies('permission', 'user.add'), 403, 'Unauthorized action.');
        $this->viewData['roles'] = UserService::getOptionRoles();

        return view('admin.users.create', $this->viewData);
    }

    public function store(Request $request)
    {
        abort_if (Gate::denies('permission', 'user.add'), 403, 'Unauthorized action.');
        $validate = UserService::validateCreate($request->all());
        if ($validate->fails()) {
            return redirect()->action('Admin\UsersController@create')->withErrors($validate)->withInput($request->all());
        }

        if ($user = UserService::create($request->all())) {
            return redirect()->action('Admin\UsersController@edit', $user->id)->with('message', trans('labels.create_success'));
        }

        return redirect()->action('Admin\UsersController@index')->with('error', trans('labels.create_false'));
    }

    public function edit(User $user)
    {
        abort_if (Gate::denies('permission', 'user.edit'), 403, 'Unauthorized action.');
        $this->viewData['user'] = $user;
        $this->viewData['roles'] = UserService::getOptionRoles();

        return view('admin.users.edit', $this->viewData);
    }

    public function update(Request $request, User $user)
    {
        abort_if (Gate::denies('permission', 'user.edit'), 403, 'Unauthorized action.');
        $validate = UserService::validateEdit($request->all(), $user->id);
        if ($validate->fails()) {
            return redirect()->action('Admin\UsersController@edit', $user->id)->withErrors($validate)->withInput($request->all());
        }

        if (!UserService::update($request->all(), $user)) {
            return redirect()->action('Admin\UsersController@edit', $user->id)->with('error', trans('labels.update_false'));
        }

        return redirect()->action('Admin\UsersController@edit', $user->id)->with('message', trans('labels.update_success'));
    }

    public function destroy(User $user)
    {
        abort_if (Gate::denies('permission', 'user.delete'), 403, 'Unauthorized action.');
        if ($user->delete()) {
            return back()->with('message', trans('admin/users.messages.delete_success'));
        }

        return back()->with('error', trans('admin/users.messages.delete_fail'));
    }

    public function restore(User $user)
    {
        abort_if (Gate::denies('permission', 'user.edit'), 403, 'Unauthorized action.');
        if ($user->restore()) {
            return back()->with('message', trans('admin/users.messages.restore_success'));
        }

        return back()->with('error', trans('admin/users.messages.restore_fail'));
    }
}
