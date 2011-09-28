<?


abstract class Controller extends Kohana_Controller {


	protected $post_process = false;


	public function post_process () {
	
		realpostprocess::add_object($this);
	}
	
	
	public function before() {
		
		if($this->post_process === true)
			realpostprocess::add_object($this);
		
		parent::before();
	}
}