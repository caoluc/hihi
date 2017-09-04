<?php

namespace App\Services\Admin;

use Illuminate\Pagination\LengthAwarePaginator;

class BaseService
{
    const DEFALT_ORDER = 'id.desc';

    public static function getOptionsSort()
    {
        return ['id.desc' => 'id.desc'];
    }

    public static function listItems($query, $options)
    {
        if (isset($options['keyword']) && $options['keyword']) {
            $keyword = $options['keyword'];
            $searchColumns = $options['searchColumns'] ?? [];

            $query->where(function ($currentQuery) use ($keyword, $searchColumns) {
                foreach ($searchColumns as $col) {
                    $currentQuery->orWhere($col, 'like', "%$keyword%");
                }
            });
        }

        $orderBy = $options['orderBy'] ?? null;
        if (!in_array($orderBy, array_keys(static::getOptionsSort()))) {
            $orderBy = static::DEFALT_ORDER;
        }

        $orders = explode('.', $orderBy);
        $query->orderBy($orders[0], $orders[1]);

        $columns = $options['columns'] ?? ['*'];
        if (isset($options['limit']) && $options['limit']) {
            return $query->paginate($options['limit'], $columns);
        }

        $allItems = $query->get($columns);
        $total = $allItems->count();

        return new LengthAwarePaginator($allItems, $total, $total, 1);
    }
}