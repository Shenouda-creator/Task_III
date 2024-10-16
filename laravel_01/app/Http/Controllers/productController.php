<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class productController extends Controller
{

    public function index()
    {
        // $products = [
        //     [
        //         'title' => 'product 1',
        //         'price' => '200.00',
        //         'description' => 'description for product 1',
        //         'offer' => '150',
        //         'is_new' => true,
        //     ],
        //     [

        //         'title' => 'product 2',
        //         'price' => '200.00',
        //         'description' => 'description for product 2',
        //         'offer' => '150',
        //         'is_new' => true,

        //     ],
        //     [

        //         'title' => 'product 3',
        //         'price' => '200.00',
        //         'description' => 'description for product 3',
        //         'offer' => '150',
        //         'is_new' => false,

        //     ],
        // ];
        /*$data=[
            'products'=>$products,
        ]; كده دي طريقه عشان ابعت الداتا دي
            return view('site.pages.products.index',$data);*/

        $products=Product::get();
        return view('site.pages.products.index', compact('products'));

        //array variable ->products في الطريقتين ببعت
    }

    public function create()
    {
        return view('site.pages.products.create');
    }


    public function store(ProductRequest $request)
    {
        $product=Product::create($request->validated());
      //  session()->flash('success','Product created'); equivalent:

        return redirect()->back()->with('success', 'Product created');
        // $product=new Product();
        // $product->title=$request->input('title');
        // $product->price=$request->input('price');
        // $product->description=$request->input('description');
        // $product->save();
        //return $request->query('title');
        //return $request->input('title','price');
        //return $request->all();
    }


    public function show(Product $product) {
        // $products = [
        //     [
        //         'title' => 'product 1',
        //         'price' => '200.00',
        //         'description' => 'description for product 1',
        //         'offer' => '150',
        //         'is_new' => true,
        //     ],
        //     [

        //         'title' => 'product 2',
        //         'price' => '200.00',
        //         'description' => 'description for product 2',
        //         'offer' => '150',
        //         'is_new' => true,

        //     ],
        //     [

        //         'title' => 'product 3',
        //         'price' => '200.00',
        //         'description' => 'description for product 3',
        //         'offer' => '150',
        //         'is_new' => false,

        //     ],
        // ];
        // abort_if(!isset($products[$product]),404);
        // يقوم بالتحقق من الوجود التالي في المصفوفة products
        // ��ذا كان الوجود في المصفوفة، يقوم بعرض الصفحة التي تحتوي على البيانات الخا��ة بالمنتج
        // ��لا في حالة عدم الوجود، يقوم بتمرير 404 ��لى الموقع الصفحة الر��يسية
        //$product=$products[$product];

     return view('site.pages.products.show', compact('product'));
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Product $product, string $id)
    {
        
    }


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted');
    }
}
