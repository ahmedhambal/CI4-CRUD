<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Product_model;

class ProductPG extends Controller
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new Product_model();

        /** filter */
        $like = [];
        $order = 'product_id DESC';

        $request = \Config\Services::request();
        if ($request->getGet('submit')) {
            $like   = ['product.product_name' => $request->getGet('keyword')];
        }

        $data = [
            'product' => $model->like($like)->orderBy($order)->paginate(10, 'product'),
            'pager' => $model->pager
        ];

        return view('ProductPG/product_view', $data);
    }
    public function add_new()
    {
        echo view('ProductPG/add_product_view');
    }

    public function save()
    {
        helper(['form', 'url']);

        $val = $this->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]);

        if (!$val) {
            echo view('ProductPG/add_product_view', [
                'validation' => $this->validator
            ]);
        } else {
            $model = new Product_model();
            $data = array(
                'product_name'  => $this->request->getPost('product_name'),
                'product_price' => $this->request->getPost('product_price'),
            );
            $model->saveProduct($data);
            session()->setFlashdata('success', 'Created data successfully');
            return redirect()->to('/productPG');
        }
    }

    public function edit($id)
    {
        $model = new Product_model();
        $data['product'] = $model->getProduct($id)->getRow();
        echo view('ProductPG/edit_product_view', $data);
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
            echo view('ProductPG/edit_product_view', $dataById);
        } else {
            $data = array(
                'product_name'  => $this->request->getPost('product_name'),
                'product_price' => $this->request->getPost('product_price'),
            );
            $model->updateProduct($data, $id);
            session()->setFlashdata('success', 'Update data successfully');
            return redirect()->to('/productPG');
        }
    }

    public function delete($id)
    {
        $model = new Product_model();
        $model->deleteProduct($id);
        session()->setFlashdata('success', 'Delete data successfully');
        return redirect()->to('/productPG');
    }
}
