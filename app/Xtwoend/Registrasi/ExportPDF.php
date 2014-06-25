<?php namespace Xtwoend\Registrasi;


use Illuminate\View\Factory;
use Thujohn\Pdf\PdfFacade as PDF;

class ExportPDF 
{
	/** 
     * view handle
     * @return void
     */
    protected $view;

    protected $content;

	public function __construct(Factory $view)
	{
		$this->view = $view;
	}


	public function setContent($data)
	{
		$this->content = $this->view->make('registrasitemplate::Pdf', array('data' => $data))->render();
		return $this;
	}


	public function getContent()
	{
		return $this->content;
	}

	public function show()
	{
		return $this->make()->show();
	}

	public function download($filename = 'new dpf')
	{
		return $this->make()->download($filename);
	}

	public function make()
	{
		return PDF::load($this->getContent(), 'A4', 'portrait');
	}
	
	/**
	 * Magic method 
	 *
	 * @param  string $method
	 * @param  array  $parameters
	 * @return mixed
	 */
	public function __call($method, $parameters)
  	{
	    if (in_array($method, array('get', 'download')))
	    {
	      return call_user_func_array(array($this, $method), $parameters);
	    }
  	}
}

