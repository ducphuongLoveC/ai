<?php

class HomeController extends BaseController
{
    protected $productModel;
    protected $categoryModel;
 
    
    protected $about_banners;
    public function __construct()
    {
        
        $this->loadModel('ProductModel');
        $this->loadModel('CategoryModel');
        $this->categoryModel = new CategoryModel;
        $this->productModel = new ProductModel;
    }

    public function index()
    {
        $latest_products8 = $this->productModel->getProducts(8);
        $latest_products4 = $this->productModel->getProducts(4);
        $categories = $this->categoryModel->getAll();
        $offer_pro = $this->productModel->getProductHighestSalePercent();


        return $this->view('site.home.index', [
            'latest_products8'  => $latest_products8,
            'latest_products4' => $latest_products4,
            'categories' => $categories,
            'offer_pro' => $offer_pro
        ]);
    }

    public function about()
    {

        return $this->view('site.about.index', [
            'banners' => $this->about_banners
        ]);
    }
}
