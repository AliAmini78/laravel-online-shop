<?php

namespace Web\Products\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Web\Products\Database\Repositories\Contracts\ProductRepositoryInterface;
use Web\Products\Http\Requests\ProductRequest;
use Web\Products\Models\Product;
use Web\Products\Services\NotificationServices;

class ProductController extends Controller
{

    private ProductRepositoryInterface $productRepository;
    private NotificationServices $notificationServices;
    private string $controllerName = 'محصول';
    public function __construct(
        ProductRepositoryInterface $productRepository,
        NotificationServices $notificationServices
    )
    {
        $this->productRepository = $productRepository;
        $this->notificationServices = $notificationServices;
    }

    /**
     * Display a listing of the resource.
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $products = $this->productRepository->paginate();

        return view('Product::product.panel.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function create(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('Product::product.panel.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        $newProduct = $this->productRepository->store($request->validated());

        $this->notificationServices->sendNewProductNotificationToAdmin($newProduct);
        return redirect()->route('product.index')->with('success_message' , __("messages.created" , ['attribute' => $this->controllerName]));
    }

    /**
     * Display the specified resource.
     * @param Product $product
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(Product $product): \Illuminate\Foundation\Application|View|Factory|Application
    {

        return view('Product::product.panel.show' , compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param Product $product
     * @return Factory|\Illuminate\Foundation\Application|View|Application
     */
    public function edit(Product $product): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view("Product::product.panel.edit" , compact('product'));
    }

    /**
     * Update the specified resource in storage.
     * @param ProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $this->productRepository->update($request->validated() , $product);
        return redirect()->route('product.index')->with('success_message' , __("messages.updated" , ['attribute' => $this->controllerName]));
    }

    /**
     * Remove the specified resource from storage.
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $this->productRepository->destroy($product);

        return redirect()->route('product.index')->with('success_message' , __("messages.deleted" , ['attribute' => $this->controllerName]));
    }

    /**
     * list of product in front page
     * @return Application|Factory|\Illuminate\Foundation\Application|View
     */
    public function frontProductList(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $products = $this->productRepository->paginate();

        return view('Product::product.home.list' , compact('products'));
    }
}
