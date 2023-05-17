<?php

namespace Web\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Web\Products\Models\Product;

class CartController extends Controller
{
    /**
     * show all user cart item
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function showCart(Request $request): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        // fet cart
        $cart = $request->cookie('cart');

        //check cart exist
        if ($cart) {
            $cart = json_decode($cart, true);
        } else {
            $cart = [];
        }

        return view('Product::cart.list',compact('cart'));
    }

    /**
     * store in cart
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function addToCart(Request $request, Product $product): RedirectResponse
    {
        // check count of item
        if ($product->count == 0)
            return redirect()->back()->with('error_message' , __('messages.item_finished'));

        //get cookie
        $cart = $request->cookie('cart');

        //check the cart
        if (!$cart) {
            $cart = [];
        } else {
            $cart = json_decode($cart, true);
        }

        //check is item in cart
        if (isset($cart[$product->id]))
            return redirect()->back()->with('error_message' ,__('messages.item_exist'));

        // add cart
        $cart[$product->id] = [
            'title' => $product->title,
            'price' => $product->price,
        ];

        //decrement the count of product
        $product->decrementCount();

        //redirect
        return redirect()->back()->withCookie(cookie()->forever('cart', json_encode($cart)))->with('success_message',__('messages.item_add'));
    }

    /**
     * remove product from cart
     * @param Request $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function removeFromCart(Request $request, Product $product): RedirectResponse
    {
        //get the cart
        $cart = $request->cookie('cart');

        //check is cart exist
        if ($cart) {
            $cart = json_decode($cart, true);

            //check item exist
            if (isset($cart[$product->id])) {
                unset($cart[$product->id]);

                //increment the count of product
                $product->incrementCount();

                return redirect()->back()->withCookie('cart', json_encode($cart))->with('success_message',__('messages.item_remove'));
            }
        }

        return redirect()->back()->with('error_message' ,__('messages.item_not_found'));
    }
}
