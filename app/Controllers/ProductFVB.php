<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;

class ProductFVB extends Controller
{
    public function index()
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct();
        echo view('ProductFVB/product_view', $data);
    }
    public function add_new()
    {
        echo view('ProductFVB/add_product_view');
    }

    public function save()
    {
        helper(['form', 'url']);

        $val = $this->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]);

        if (!$val) {
            echo view('ProductFVB/add_product_view', [
                'validation' => $this->validator
            ]);
        } else {
            $model = new Product_model();
            $data = array(
                'product_name'  => $this->request->getPost('product_name'),
                'product_price' => $this->request->getPost('product_price'),
            );
            $model->saveProduct($data);
            return redirect()->to('/productFVB');
        }
    }

    public function edit($id)
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct($id)->getRow();
        echo view('ProductFVB/edit_product_view', $data);
    }

    public function update()
    {
        helper(['form', 'url']);

        $model = new Product_model();
        $id = $this->request->getPost('product_id');

        $val = $this->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]);

        $dataById['product'] = $data['product'] = $model->getProduct($id)->getRow();
        $dataById['validation'] = $this->validator;

        if (!$val) {
            echo view('ProductFVB/edit_product_view', $dataById);
        } else {
            $data = array(
                'product_name'  => $this->request->getPost('product_name'),
                'product_price' => $this->request->getPost('product_price'),
            );
            $model->updateProduct($data, $id);
            return redirect()->to('/productFVB');
        }
    }

    public function delete($id)
    {
        $model = new Product_model();
        $model->deleteProduct($id);
        return redirect()->to('/productFVB');
    }
}
