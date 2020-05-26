<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;

class ProductFV extends Controller
{
    public function index()
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct();
        echo view('ProductFV/product_view', $data);
    }
    public function add_new()
    {
        echo view('ProductFV/add_product_view');
    }

    public function save()
    {
        $model = new Product_model();
        $data = array(
            'product_name'  => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
        );
        $model->saveProduct($data);
        return redirect()->to('/productFV');
    }

    public function edit($id)
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct($id)->getRow();
        echo view('ProductFV/edit_product_view', $data);
    }

    public function update()
    {
        $model = new Product_model();
        $id = $this->request->getPost('product_id');
        $data = array(
            'product_name'  => $this->request->getPost('product_name'),
            'product_price' => $this->request->getPost('product_price'),
        );
        $model->updateProduct($data, $id);
        return redirect()->to('/productFV');
    }

    public function delete($id)
    {
        $model = new Product_model();
        $model->deleteProduct($id);
        return redirect()->to('/productFV');
    }
}
