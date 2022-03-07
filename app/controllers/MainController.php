<?php
namespace controllers;
 use Ubiquity\attributes\items\router\Route;
 use Ubiquity\controllers\auth\AuthController;
 use Ubiquity\controllers\auth\WithAuthTrait;

 /**
  * Controller MainController
  */
class MainController extends \controllers\ControllerBase{

    use WithAuthTrait;

    #[Autowired]
    pivate OrgaRepository $repo;

    #[Route('_default', name:  'home')]
	public function index(){
        $user=$this->getAuthController()->_getActiveUser();
        $this->repo->byId(USession::get('idOrga'));
		$this->loadView("MainController/index.html", ['user']);
	}


    protected function getAuthController(): AuthController
    {
        return new MyAuth($this);
    }
}
