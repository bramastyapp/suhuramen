<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\User;
use App\Models\UserAccessMenu;
use App\Policies\UserAccessMenuPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // 'App\Models\Menu' => 'App\Policies\UserAccessMenuPolicy',
        // Menu::class => UserAccessMenuPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('lihat', function (User $user, $menuId) {
            $access_menu = UserAccessMenu::where(['user_role_id' => $user->id, 'menu_id' => $menuId])->first();
            if($access_menu && $access_menu->lihat === 1)
            {
                return true;
            }
            return false;
        });
    }
}
