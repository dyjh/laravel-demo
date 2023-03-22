<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductProperty;
use App\Models\ProductSku;
use App\Observers\ProductObserver;
use App\Observers\ProductPropertyObserver;
use App\Observers\ProductSkuObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 注册观察者服务
         */
        Product::observe(ProductObserver::class);
        ProductSku::observe(ProductSkuObserver::class);
        ProductProperty::observe(ProductPropertyObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
