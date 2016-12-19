<?php
namespace PhilippBauer\Functestexmpl\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Philipp Bauer <hello@philippbauer.org>, Philipp Bauer _ Freelance Webdeveloper
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * DeviceController
 */
class DeviceController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * deviceRepository
	 *
	 * @var \PhilippBauer\Functestexmpl\Domain\Repository\DeviceRepository
	 * @inject
	 */
	protected $deviceRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$devices = $this->deviceRepository->findAll();
		$this->view->assign('devices', $devices);
	}

	/**
	 * action show
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Device $device
	 * @return void
	 */
	public function showAction(\PhilippBauer\Functestexmpl\Domain\Model\Device $device) {
		$this->view->assign('device', $device);
	}

	/**
	 * action new
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Device $newDevice
	 * @ignorevalidation $newDevice
	 * @return void
	 */
	public function newAction(\PhilippBauer\Functestexmpl\Domain\Model\Device $newDevice = NULL) {
		$this->view->assign('newDevice', $newDevice);
	}

	/**
	 * action create
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Device $newDevice
	 * @return void
	 */
	public function createAction(\PhilippBauer\Functestexmpl\Domain\Model\Device $newDevice) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->deviceRepository->add($newDevice);
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Device $device
	 * @ignorevalidation $device
	 * @return void
	 */
	public function editAction(\PhilippBauer\Functestexmpl\Domain\Model\Device $device) {
		$this->view->assign('device', $device);
	}

	/**
	 * action update
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Device $device
	 * @return void
	 */
	public function updateAction(\PhilippBauer\Functestexmpl\Domain\Model\Device $device) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->deviceRepository->update($device);
		$this->redirect('list');
	}

	/**
	 * action disable
	 *
	 * @return void
	 */
	public function disableAction() {
		
	}

}