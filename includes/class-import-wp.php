<?php

class WPImportCustom {
  
  public function __construct()
  {
    
  }

  public function import() 
  {
    if (file_exists(wp_upload_dir()["path"] . '/import.xml')) {
      $xml = simplexml_load_file(wp_upload_dir()["path"] . '/import.xml');
      foreach($xml->shop->offers->offer as $obj) {
        $product_id = "";
        if((string)$obj->sku) {
          $product_id = wc_get_product_id_by_sku((string)$obj->sku);
        }
        if ($product_id) {
          $product = wc_get_product($product_id);
        } else {
          $product = new WC_Product_Simple();
          $product->set_status('draft');
        }

        if ($product) {
          if ((string)$obj->product_name) {
            $product->set_name($obj->product_name);
          }
          if ((float)$obj->price) {
            $product->set_regular_price((float)$obj->price);
          }
          if ((string)$obj->saleprice) {
            $product->set_sale_price((string)$obj->saleprice);
          }

          $stockStr = "instock";
          if (!((int)$obj->stock)) {
            $stockStr = "outofstock";
          }
          $product->set_stock_status($stockStr);

          if ((string)$obj->sku) {
            $product->set_sku((string)$obj->sku);
          }

          $product->save();
        }
      }
    }
  }
}
