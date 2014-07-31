<?php
require '../vendor/autoload.php'; // use PCRE patterns you need Pux\PatternCompiler class.
use Pux\Executor;

class ProductController {
    public function listAction() {
        return 'product list';
    }
    public function itemAction($id) { 
        return "product $id";
    }
}
$mux = new Pux\Mux;
$mux->add('/product', ['ProductController','listAction']);
$mux->add('/product/:id', ['ProductController','itemAction'] , [
    'require' => [ 'id' => '\d+', ],
    'default' => [ 'id' => '1', ]
]);
$route = $mux->dispatch('/product/1');
Executor::execute($route);