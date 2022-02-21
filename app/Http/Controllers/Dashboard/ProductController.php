<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param SearchRequest $request
     * @return Application|Factory|View
     */
    public function index(SearchRequest $request): Application|Factory|View
    {
        $validated= $request->validated();

        $searchText = $validated["search"] ?? "";
        $products = Product::query()
            ->whereLike(["name"],$searchText)
            ->paginate(25);
        return view("web.dashboard.sections.products.index",
            compact("products")
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view("web.dashboard.sections.products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductRequest $request
     * @return RedirectResponse
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        try {
            Product::create($validated);
            return redirect()->route("dashboard.products.index")->with("success", __("messages.product.create.success"));
        } catch (Exception) {
            return redirect()->back()->with("errors", __("messages.product.create.failed"))->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function show(Product $product): View|Factory|Application
    {
        return view("web.dashboard.sections.products.show",
            compact("product")
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product): View|Factory|Application
    {
        return view("web.dashboard.sections.products.edit",
            compact('product')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductRequest $request
     * @param Product $product
     * @return RedirectResponse
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $validated = $request->validated();
        try{
            $product->update($validated);
            return redirect()->route("dashboard.products.index")->with("success",__("messages.product.update.success"));
        }catch (Exception){
            return redirect()->back()->with("errors",__("messages.product.update.success"))->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        try{
            $product->delete();
            return redirect()->route("dashboard.products.index")->with('success',__("messages.product.delete.success"));
        }catch (Exception){
            return redirect()->back()->with('errors',__("messages.product.delete.success"));
        }
    }
}
