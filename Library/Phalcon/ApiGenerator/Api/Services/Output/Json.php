<?php
namespace Phalcon\ApiGenerator\Api\Services\Output;
use \Phalcon\Http\Response;
class Json implements OutputInterface {
	/**
	 * This takes in object, and outputs it in the respective format, including sending the headers
	 *
	 * @param \stdClass $object
	 * @param Response  $response
	 *
	 * @return void
	 */
	public function output(\stdClass $object, Response $response) {
		$response->setContentType('application/json');
		$response->setJsonContent($object);
		$response->send();
	}
}
