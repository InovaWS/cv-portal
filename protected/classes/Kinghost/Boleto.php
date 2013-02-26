<?php
namespace Kinghost;

class Boleto extends Kinghost
{
	// getBoletos() {{{
	/**
	* Retorna os boletos do cliente e dominio passados como parâmetro juntamente com o status solicitado (pago ou aberto)
	*
	* @access public
	* @return object
	*/
	public function getBoletos($idCliente, $status = 'aberto', $idDominio = null)
	{
		$uri = 'boleto/' . $idCliente . ($idDominio ? '/' . $idDominio : '') . "/$status";
		$this->doCall( $uri , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// getBancos() {{{
	/**
	* Retorna lista dos bancos para configuração de boletos.
	*
	* @access public
	* @return object
	*/
	public function getBancos()
	{
		$this->doCall( 'boleto/bancos' , '' , 'GET');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}

	// criarBoleto() {{{
	/**
	* Cria um novo boleto.
	*
	* @access public
	* @return object
	*/
	public function criarBoleto( $idCliente , $idDominio , $idBanco , $vencimento , $valor , $instrucao , $desc )
	{
		$this->doCall('boleto/',
				compact('idCliente', 'idDominio', 'idBanco', 'vencimento', 'valor', 'instrucao', 'desc'), 'POST');
		return @json_decode($this->getResponseBody() , true);
	}
	// }}}
	
}