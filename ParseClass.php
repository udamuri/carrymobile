<?php

/**
* Class ParseClass.php
*/
class ParseClass 
{
	
	public $data = '';
	
	/**
	* Get parse data
	*/
	public function getParseData()
	{
		if($this->data !== '')
		{
			return $this->parseData($this->data);
		}

		return false;
	}

	/**
	*  parse data
	*  @param String $data
	*/
	private function parseData($data="")
	{
		try {
			$string = $data;
          	$parse = explode(" ",$string);

			$arrData = [];

			$name = '';
			$addr = '';
			$postalcode = '';
			$phone = '';
			$stopKey = false ;
			foreach ($parse as $key => $value) {
				if($key == 0)
				{
					$name = $value;
				}

				$addrDump = '';

				if($key > 0 && $stopKey == false )
				{
					$addrDump = $value.' ';
					if($value == 'Tel.' || ($parse[($key - 1)] !== 'No.' && is_numeric($value) && strlen($value) == 5))
					{
						$stopKey = true;
						$addrDump = '';
					}
					$addr .= $addrDump.' ';
				}

				if($key > 0 && ($parse[($key - 1)] !== 'No.' && is_numeric($value) && strlen($value) == 5) )
				{
					$postalcode = $value;
				}

				if($key > 0 && $value == 'Tel.')
				{
					$phone = $parse[$key + 1];
				}
			} 

			$arrData['nama'] = $name;
			$arrData['alamat'] = $addr;
			$arrData['kode_pos'] = $postalcode;
			$arrData['telepon'] = $phone;

			return $arrData;

        } catch (Exception $e) {
            throw $e;
        }

	}
}
