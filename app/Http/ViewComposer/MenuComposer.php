<?php

namespace App\Http\ViewComposer;

use App\Models\Menu;
use Illuminate\Contracts\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MenuComposer
{
    public function compose($view)
    {
        // $menu = Menu::with('children')->orderBy('priority','asc')->whereNull('menu_id')->get();
        // $view->with('menu', $menu);
        /** @var User|null $user */
        $user = Auth::user();
            // Si no hay usuario, no mostramos nada
        if (!$user) {
            $view->with('menu', collect());
            return;
        }

        // Obtener roles del usuario
        $roles = $user->roles->pluck('name')->toArray();

        // Si es superadmin o developer, mostrar todo el menú
        if (in_array('superadmin', $roles) || in_array('developer', $roles)) {
            $menu = Menu::with('children')->orderBy('priority', 'asc')->whereNull('menu_id')->get();
        } else {
            // Filtrar por roles
            $menu = Menu::with('children')
                ->orderBy('priority', 'asc')
                ->whereNull('menu_id')
                ->get()
                ->filter(function ($item) use ($roles) {
                    return empty($item->roles) || array_intersect($item->roles, $roles);
                })
                ->map(function ($item) use ($roles) {
                    $item->children = $item->children->filter(function ($child) use ($roles) {
                        return empty($child->roles) || array_intersect($child->roles, $roles);
                    });
                    return $item;
                });
        }
        $view->with('menu', $menu);
    }
}