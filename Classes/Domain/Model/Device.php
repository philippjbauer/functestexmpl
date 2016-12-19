<?php
namespace PhilippBauer\Functestexmpl\Domain\Model;

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
 * Device
 */
class Device extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * deviceId
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $deviceId = '';

	/**
	 * interventions
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Intervention>
	 * @cascade remove
	 * @lazy
	 */
	protected $interventions = NULL;

	/**
	 * operatingTimes
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\OperatingTime>
	 * @cascade remove
	 * @lazy
	 */
	protected $operatingTimes = NULL;

	/**
	 * location
	 *
	 * @var \PhilippBauer\Functestexmpl\Domain\Model\Location
	 * @lazy
	 */
	protected $location = NULL;

	/**
	 * software
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Software>
	 * @cascade remove
	 * @lazy
	 */
	protected $software = NULL;

	/**
	 * hardware
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Hardware>
	 * @cascade remove
	 * @lazy
	 */
	protected $hardware = NULL;

	/**
	 * licenses
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\License>
	 * @cascade remove
	 * @lazy
	 */
	protected $licenses = NULL;

	/**
	 * company
	 *
	 * @var \PhilippBauer\Functestexmpl\Domain\Model\Company
	 * @lazy
	 */
	protected $company = NULL;

	/**
	 * configuration
	 *
	 * @var \PhilippBauer\Functestexmpl\Domain\Model\Configuration
	 * @lazy
	 */
	protected $configuration = NULL;

	/**
	 * Returns the location
	 *
	 * @return \PhilippBauer\Functestexmpl\Domain\Model\Location $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Location $location
	 * @return void
	 */
	public function setLocation(\PhilippBauer\Functestexmpl\Domain\Model\Location $location) {
		$this->location = $location;
	}

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->interventions = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->operatingTimes = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->software = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->hardware = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->licenses = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Adds a Intervention
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Intervention $intervention
	 * @return void
	 */
	public function addIntervention(\PhilippBauer\Functestexmpl\Domain\Model\Intervention $intervention) {
		$this->interventions->attach($intervention);
	}

	/**
	 * Removes a Intervention
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Intervention $interventionToRemove The Intervention to be removed
	 * @return void
	 */
	public function removeIntervention(\PhilippBauer\Functestexmpl\Domain\Model\Intervention $interventionToRemove) {
		$this->interventions->detach($interventionToRemove);
	}

	/**
	 * Returns the interventions
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Intervention> $interventions
	 */
	public function getInterventions() {
		return $this->interventions;
	}

	/**
	 * Sets the interventions
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Intervention> $interventions
	 * @return void
	 */
	public function setInterventions(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $interventions) {
		$this->interventions = $interventions;
	}

	/**
	 * Adds a Software
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Software $software
	 * @return void
	 */
	public function addSoftware(\PhilippBauer\Functestexmpl\Domain\Model\Software $software) {
		$this->software->attach($software);
	}

	/**
	 * Removes a Software
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Software $softwareToRemove The Software to be removed
	 * @return void
	 */
	public function removeSoftware(\PhilippBauer\Functestexmpl\Domain\Model\Software $softwareToRemove) {
		$this->software->detach($softwareToRemove);
	}

	/**
	 * Returns the software
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Software> $software
	 */
	public function getSoftware() {
		return $this->software;
	}

	/**
	 * Sets the software
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Software> $software
	 * @return void
	 */
	public function setSoftware(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $software) {
		$this->software = $software;
	}

	/**
	 * Adds a Hardware
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Hardware $hardware
	 * @return void
	 */
	public function addHardware(\PhilippBauer\Functestexmpl\Domain\Model\Hardware $hardware) {
		$this->hardware->attach($hardware);
	}

	/**
	 * Removes a Hardware
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Hardware $hardwareToRemove The Hardware to be removed
	 * @return void
	 */
	public function removeHardware(\PhilippBauer\Functestexmpl\Domain\Model\Hardware $hardwareToRemove) {
		$this->hardware->detach($hardwareToRemove);
	}

	/**
	 * Returns the hardware
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Hardware> $hardware
	 */
	public function getHardware() {
		return $this->hardware;
	}

	/**
	 * Sets the hardware
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\Hardware> $hardware
	 * @return void
	 */
	public function setHardware(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $hardware) {
		$this->hardware = $hardware;
	}

	/**
	 * Adds a License
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\License $license
	 * @return void
	 */
	public function addLicense(\PhilippBauer\Functestexmpl\Domain\Model\License $license) {
		$this->licenses->attach($license);
	}

	/**
	 * Removes a License
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\License $licenseToRemove The License to be removed
	 * @return void
	 */
	public function removeLicense(\PhilippBauer\Functestexmpl\Domain\Model\License $licenseToRemove) {
		$this->licenses->detach($licenseToRemove);
	}

	/**
	 * Returns the licenses
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\License> $licenses
	 */
	public function getLicenses() {
		return $this->licenses;
	}

	/**
	 * Sets the licenses
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\License> $licenses
	 * @return void
	 */
	public function setLicenses(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $licenses) {
		$this->licenses = $licenses;
	}

	/**
	 * Returns the company
	 *
	 * @return \PhilippBauer\Functestexmpl\Domain\Model\Company $company
	 */
	public function getCompany() {
		return $this->company;
	}

	/**
	 * Sets the company
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Company $company
	 * @return void
	 */
	public function setCompany(\PhilippBauer\Functestexmpl\Domain\Model\Company $company) {
		$this->company = $company;
	}

	/**
	 * Adds a OperatingTime
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\OperatingTime $operatingTime
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\OperatingTime> operatingTimes
	 */
	public function addOperatingTime(\PhilippBauer\Functestexmpl\Domain\Model\OperatingTime $operatingTime) {
		$this->operatingTimes->attach($operatingTime);
	}

	/**
	 * Removes a OperatingTime
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\OperatingTime $operatingTimeToRemove The OperatingTime to be removed
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\OperatingTime> operatingTimes
	 */
	public function removeOperatingTime(\PhilippBauer\Functestexmpl\Domain\Model\OperatingTime $operatingTimeToRemove) {
		$this->operatingTimes->detach($operatingTimeToRemove);
	}

	/**
	 * Returns the operatingTimes
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\OperatingTime> operatingTimes
	 */
	public function getOperatingTimes() {
		return $this->operatingTimes;
	}

	/**
	 * Sets the operatingTimes
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\OperatingTime> $operatingTimes
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\PhilippBauer\Functestexmpl\Domain\Model\OperatingTime> operatingTimes
	 */
	public function setOperatingTimes(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $operatingTimes) {
		$this->operatingTimes = $operatingTimes;
	}

	/**
	 * Returns the deviceId
	 *
	 * @return string $deviceId
	 */
	public function getDeviceId() {
		return $this->deviceId;
	}

	/**
	 * Sets the deviceId
	 *
	 * @param string $deviceId
	 * @return void
	 */
	public function setDeviceId($deviceId) {
		$this->deviceId = $deviceId;
	}

	/**
	 * Returns the configuration
	 *
	 * @return \PhilippBauer\Functestexmpl\Domain\Model\Configuration $configuration
	 */
	public function getConfiguration() {
		return $this->configuration;
	}

	/**
	 * Sets the configuration
	 *
	 * @param \PhilippBauer\Functestexmpl\Domain\Model\Configuration $configuration
	 * @return void
	 */
	public function setConfiguration(\PhilippBauer\Functestexmpl\Domain\Model\Configuration $configuration) {
		$this->configuration = $configuration;
	}

}