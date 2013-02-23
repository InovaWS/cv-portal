<?php
namespace CV\Model;

use Kinghost\Boleto;

use Kinghost\Cliente;

use Kinghost\KinghostException;

use Kinghost\Dominio;

class BoletoManager
{
	private static $login = 'rian3rdesign@hotmail.com';
	private static $password = 'nachosenhor';
	
	private $api;
	private $idCliente;
	private $idDominio;
	private $idBanco;
	
	public function __construct()
	{
		$this->api = new Boleto(self::$login, self::$password);
	}
	
	public function receberInformacoesBasicas()
	{
		$this->idCliente = null;
		$this->idDominio = null;
		
		$clienteAPI = new Cliente(self::$login, self::$password);
		$clientes = $clienteAPI->getClientes();
		
		if ($clientes['status'] != 'ok')
			throw new KinghostException();
		
		foreach ($clientes['body'] as $cliente) {
			if ($cliente['clienteEmail'] == 'rian@centraldoveiculo.com.br')
				$this->idCliente = $cliente['idCliente'];
		}
		
		if (!$this->idCliente)
			throw new KinghostException();
		
		$dominioAPI = new Dominio(self::$login, self::$password);
		$dominios = $dominioAPI->getDominios($this->idCliente);
		
		if ($dominios['status'] != 'ok')
			throw new KinghostException();
		
		foreach ($dominios['body'] as $tupla) {
			if ($tupla['dominio'] == 'centraldoveiculo.com.br')
				$this->idDominio = $tupla['id'];
		}
		
		if (!$this->idDominio)
			throw new KinghostException();
	}
	
	public function getAbertos()
	{
		$boletoAPI = new Boleto(self::$login, self::$password);
		$response = $boletoAPI->getBoletos($this->idCliente, 'aberto', $this->idDominio);
		
		if ($response['status'] != 'ok')
			throw new KinghostException();
		
		return $response['body'];
	}
	
	public function getPagos()
	{
		$response = $this->api->getBoletos($this->idCliente, 'pago', $this->idDominio);
		
		if ($response['status'] != 'ok')
			throw new KinghostException();
		
		return $response['body'];
	}
	
	public function getBancos()
	{
		$response = $this->api->getBancos();
		
		if ($response['status'] != 'ok')
			throw new KinghostException();
		
		return $response['body'];
	}
	
	public function criar(\DateTime $vencimento, $valor, $instrucao = '', $desc = '')
	{
		if (!$this->idBanco) {
			$response = $this->api->getBancos();
			
			if ($response['status'] != 'ok')
				throw new KinghostException();
			
			$banco = array_shift($response['body']);
			$this->idBanco = $banco['id'];
		}
		
		$response = $this->api->criarBoleto($this->idCliente, $this->idDominio, $this->idBanco,
		               $vencimento->format('Y-m-d'),
		               number_format($valor, 2, ',', ''),
		               $instrucao,
		               $desc);
		
		if ($response['status'] != 'ok')
			throw new KinghostException();
		
		return (object)($response['body']);
	}
	
}