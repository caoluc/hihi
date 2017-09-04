<?php
namespace App\Services\Admin;

use App\Models\{User, Role};
use Validator;
use DB;

class UserService extends BaseService
{
    const DEFALT_ORDER = 'id.asc';

    public static function validateCreate($inputs)
    {
        $validationRules = [
            'password' => 'min:6',
            'email' => 'required|email|unique:users',
            'role_id' => "exists:roles,id",
            'name' => 'string',
        ];

        return Validator::make($inputs, $validationRules)->setAttributeNames(trans('users'));
    }

    public static function create($input)
    {
        DB::beginTransaction();
        try {
            $input['password'] = bcrypt($input['password']);
            $user = User::create($input);
            DB::commit();

            return $user;
        } catch (Exception $e) {
            DB::rollback();

            return false;
        }
    }

    public static function validateEdit($inputs, $id)
    {
        $validationRules = [
            'password' => 'min:6',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => "exists:roles,id",
            'name' => 'string',
        ];

        return Validator::make($inputs, $validationRules)->setAttributeNames(trans('users'));
    }

    public static function update($input, $user)
    {
        DB::beginTransaction();
        try {
            if (strlen($input['password']) == 0) {
                unset($input['password']);
            } else {
                $input['password'] = bcrypt($input['password']);
            }

            $user->update($input);
            DB::commit();
            return $user;

        } catch (Exception $e) {
            DB::rollback();

            return false;
        }
    }

    public static function getOptionRoles()
    {
        return Role::lists('title', 'id');
    }


    public static function getOptionsSort()
    {
        return [
            'id.asc' => trans('admin/users.orders.id_asc'),
            'id.desc' => trans('admin/users.orders.id_desc'),
            'name.asc' => trans('admin/users.orders.name_asc'),
            'name.desc' => trans('admin/users.orders.name_desc'),
            'email.asc' => trans('admin/users.orders.email_asc'),
            'email.desc' => trans('admin/users.orders.email_desc'),
        ];
    }

    public static function list($options)
    {
        $defaultOptions = [
            'limit' => 0,
            'keyword' => '',
            'withTrashed' => false,
            'orderBy' => self::DEFALT_ORDER,
            'parentId' => '',
            'excludeNoParent' => false, // Include items has no parent in results?
            'columns' => ['*'],
            'searchColumns' => ['name', 'email'],
            'with' => [],
        ];

        // Override default options
        $options = array_merge($defaultOptions, $options);

        $query = $options['withTrashed'] ? User::withTrashed() : User::withoutTrashed();

        if ($options['with'] && is_array($options['with'])) {
            $query->with($options['with']);
        }

        return static::listItems($query, $options);
    }
}
