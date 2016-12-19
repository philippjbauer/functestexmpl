<?php
namespace PhilippBauer\Functestexmpl\Tests\Functional\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Philipp Bauer <hello@philippbauer.org>, Philipp Bauer _ Freelance Webdeveloper
 *              
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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

require_once __DIR__ . '/../../AbstractFunctionalTestCase.php';
use PhilippBauer\Functestexmpl\Tests\Functional\AbstractFunctionalTestCase;

use PhilippBauer\Functestexmpl\Domain\Model\Device;
use PhilippBauer\Functestexmpl\Domain\Repository\DeviceRepository;

use PhilippBauer\Functestexmpl\Domain\Model\Company;
use PhilippBauer\Functestexmpl\Domain\Repository\CompanyRepository;

/**
 * DeviceRepositoryTest
 */
class DeviceRepositoryTest extends AbstractFunctionalTestCase
{

    /**
     * Device Repository
     * @var DeviceRepository
     */
    protected $deviceRepository = null;

    /**
     * Company Repository
     * @var CompanyRepository
     */
    protected $companyRepository = null;
    
    public function setUp() {
        parent::setUp();
        
        $_GET['id'] = 1; // TYPO3 magic makes this the current PID

        $this->deviceRepository = $this->objectManager->get(DeviceRepository::class);
        $this->companyRepository = $this->objectManager->get(CompanyRepository::class);
    }

    public function tearDown() {
        // code

        parent::tearDown();
    }

    /**
     * @test
     */
    public function userCanOnlyGetDevicesFromHisCompany()
    {
        $company = $this->companyRepository->findByUid(1);
        $devices = $this->deviceRepository->findByCompany($company);

        $this->assertCount(2, $devices);
    }
}
