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
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:products.list', ['only' => ['index','show']]);
        $this->middleware('permission:products.create', ['only' => ['create','store']]);
        $this->middleware('permission:products.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:products.delete', ['only' => ['destroy']]);
    }
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
        $product = $request->except('file');
        $file = $request->only('file')['file'];
        $product['image_path'] = $file->store('images');
        try {
            Product::create($product);
            return redirect()->route("dashboard.products.index")->with("success", __("custom/messages.success.crud.created",["item"=>trans_choice('custom/words.product',1)]));
        } catch (Exception $e) {
            return redirect()->back()->withErrors(__("custom/messages.error.crud.created",["item"=>trans_choice('custom/words.product',1)]))->withInput();
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
            return redirect()->route("dashboard.products.index")->with("success",__("custom/messages.success.crud.updated",["item"=>trans_choice('custom/words.product',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.updated",["item"=>trans_choice('custom/words.product',1)]))->withInput();
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
            return redirect()->route("dashboard.products.index")->with('success',__("custom/messages.success.crud.deleted",["item"=>trans_choice('custom/words.product',1)]));
        }catch (Exception){
            return redirect()->back()->withErrors(__("custom/messages.error.crud.deleted",["item"=>trans_choice('custom/words.product',1)]));
        }
    }
}
