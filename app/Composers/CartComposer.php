<?php

namespace App\Composers;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\View\View;

class CartComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $cart;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(Cart $cart)
    {
        $this->cart = $cart;
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('countProductInCart', $this->countProductInCart());
    }

    public function countProductInCart()
    {
        if (auth()->check()) {
            $cart =  $this->cart->getBy(auth()->user()->id);

            return $cart ? $cart->products->count() : 0;
        }

        return 0;
    }
}
