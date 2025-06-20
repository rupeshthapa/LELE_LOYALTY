<?php
namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $notificationQuery = Contact::orderBy('id', 'desc');

        View::composer('*', function ($view) use($notificationQuery) {
            $notificationCount  = $notificationQuery->count();
            $latestNotification = $notificationQuery->take(3)->get(['id', 'name', 'message', 'created_at']);
            $view->with([
                'count'         => $notificationCount,
                'notifications' => $latestNotification,
            ]);
        });
    }
}
