<?php 

namespace App\Domain;

use \GuzzleHttp\Client;

class GuzzClient
{
	private $recipepuppy_uri;
	private $reqType; 
	private $GClient;
	
	function __construct()
	{
		$this->recipepuppy_uri="http://www.recipepuppy.com/api/";
		$this->reqType="GET";
		$this->GClient = new Client;
	}

	private function makeURL(string $ingrts, string $recips, int $pag):string
	{
		$query = '?'. 'i=' . $ingrts . '&q=' . $recips . '&p=' .
					((is_int($pag)&&isset($pag)) ? ($pag) : (1));

		$uri = $this->get_recipepuppy_uri() . $query;

		return $uri;
	}

	public function querySRV(string $ingrts, string $recips, int $pag)
	{
		$response = $this->get_GClient()->request(
								$this->get_reqType() ,
								$this->makeURL($ingrts, $recips, $pag)
							);

		$return = $response->getBody()->getContents();

		return $return;
	}

	public function get_recipepuppy_uri():string
	{
		return $this->recipepuppy_uri;
	}

	public function set_recipepuppy_uri(string $uri)
	{
		$this->recipepuppy_uri = $uri;
	}

	public function get_reqType():string
	{
		return $this->reqType;
	}

	public function set_reqType(string $reqtype)
	{
		$this->reqType = $reqtype;
	}

	public function get_GClient():Client
	{
		return $this->GClient;
	}

	public function set_GClient(Client $gclient)
	{
		$this->GClient = $gclient;
	}

}