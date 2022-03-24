<?php
namespace controllers;
 use models\Product;
 use models\Section;
 use Ubiquity\orm\repositories\ViewRepository;
 use Ubiquity\attributes\items\router\Post;
 use models\Organization;
 use Ubiquity\attributes\items\router\Get;
 use Ubiquity\attributes\items\router\Route;
 use Ubiquity\controllers\Router;
 use Ubiquity\orm\DAO;
 use Ubiquity\utils\http\URequest;

 /**
  * Controller StoreController
  */
class StoreController extends \controllers\ControllerBase{

    private ViewRepository $repo;

    public function initialize() {
        parent::initialize();
        $this->repo??=new ViewRepository($this,Section::class);
    }

    public function index(){
        $this->repo->all("",["products"]);
        $compte1 = DAO::count(Product::class);
        $this->loadView("StoreController/index.html", ["compte1" => $compte1]);
	}
}
