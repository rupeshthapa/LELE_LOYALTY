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
        $notificationQuery = Contact::orderBy('id', 'desc')->where('is_read', 'unread');

        View::composer('*', function ($view) use($notificationQuery) {
            $notificationCount  = $notificationQuery->count();
            $latestNotification = Contact::orderBy('id', 'desc')->take(3)->get(['id', 'name', 'message', 'is_read', 'created_at']);
            $view->with([
                'count'         => $notificationCount,
                'notifications' => $latestNotification,
            ]);
        });
    }
}
