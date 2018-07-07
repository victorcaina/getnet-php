<?php

class GetNet_CardHashCommon extends GetNet_Model
{

	public function create($path)
	{
		// $this->generateCardHashIfNecessary();
		parent::create($path);
	}

	private function generateCardHashIfNecessary()
	{
		if(!$this->card_hash && $this->shouldGenerateCardHash()) {
			$this->card_hash = $this->generateCardHash();
		}

		if($this->card_hash) {
			unset($this->card_holder_name);
			unset($this->card_number);
			unset($this->card_expiration_month);
			unset($this->card_expiration_year);
			unset($this->card_cvv);
		}
	}

	protected function shouldGenerateCardHash()
	{
		return true;
	}

	public function generateCardHash()
	{
		debug2('AQUI PRETENDO COLOCAR O POST DA CRIACAO DA HASH DO CARTAO DE CREDITO');exit();
	}
}