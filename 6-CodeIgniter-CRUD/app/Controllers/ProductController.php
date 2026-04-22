<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    protected $productModel;
    protected $helpers = ['form', 'url'];

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->findAll();
        return view('products/index', ['products' => $products]);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        if (!$this->validate($this->productModel->validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->productModel->save([
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ]);

        return redirect()->to('/products')->with('message', 'Product created successfully');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            return redirect()->to('/products')->with('error', 'Product not found');
        }
        return view('products/edit', ['product' => $product]);
    }

    public function update($id)
    {
        $rules = $this->productModel->validationRules;
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->productModel->update($id, [
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ]);

        return redirect()->to('/products')->with('message', 'Product updated successfully');
    }

    public function delete($id)
    {
        $product = $this->productModel->find($id);
        if ($product) {
            $this->productModel->delete($id);
            return redirect()->to('/products')->with('message', 'Product deleted');
        }
        return redirect()->to('/products')->with('error', 'Product not found');
    }
}
