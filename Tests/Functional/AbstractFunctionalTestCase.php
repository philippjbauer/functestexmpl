<?php
namespace PhilippBauer\Functestexmpl\Tests\Functional;

require_once __DIR__ . '/../../vendor/autoload.php';

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
 
use \org\bovigo\vfs\vfsStream;
use TYPO3\CMS\Core\Tests\FunctionalTestCase;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Service\EnvironmentService;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager;

/**
 * AbstractFunctionalTestCase
 * Base test case for Acutronic Device Center functional tests
 */
class AbstractFunctionalTestCase extends FunctionalTestCase
{

    /**
     * Name of tested extension
     * @var string
     */
    protected $extensionName = 'functestexmpl';

    /**
     * Path to test fixtures
     * @var string
     */
    protected $fixturePath = ORIGINAL_ROOT . 'typo3conf/ext/functestexmpl/Tests/Fixtures/';

    /**
     * Test extensions to load
     * @var array
     */
    protected $testExtensionsToLoad = [
        'typo3conf/ext/functestexmpl'
    ];

    /**
     * Map paths for tests
     * @var array
     */
    protected $pathsToLinkInTestInstance = [
        'typo3conf/ext/functestexmpl/Tests/Fixtures/Files' => 'uploads/tx_functestexmpl'
    ];

    /**
     * TYPO3 Environment Service
     * @var EnvironmentService
     */
    protected $environmentService = null;

    /**
     * TYPO3 Object Manager
     * @var ObjectManager
     */
    protected $objectManager = null;

    /**
     * TYPO3 Persistence Manager
     * @var PersistenceManager
     */
    protected $persistenceManager = null;

    /**
     * VFS Stream FS
     * @var vfsStream
     */
    protected $filesystem = null;
    
    public function setUp() {
        parent::setUp();

        // Setup TYPO3 dependencies
        $this->environmentService = GeneralUtility::makeInstance(EnvironmentService::class);
        $this->objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $this->persistenceManager = $this->objectManager->get(PersistenceManager::class);

        // Setup virtual filesystem
        $this->filesystem = vfsStream::setup('home');

        // Import fixtures into tests
        $models = ['company', 'device', 'hardware', 'intervention', 'license', 'location', 'operatingtime', 'software'];
        foreach ($models as $model) {
            $this->importModelDataSet($model);
        }
    }

    // public function tearDown() {
    //     // code

    //     parent::tearDown();
    // }

    /**
     * Imports the given model from the fixturePath
     * @param  string $model
     * @return boolean
     * @throws \Exception
     */
    protected function importModelDataSet($model)
    {
        $dataset = rtrim($this->fixturePath, '/') . '/Database/tx_' . $this->extensionName . '_domain_model_' . $model . '.xml';

        if (file_exists($dataset)) {
            $this->importDataSet($dataset);
        } else {
            throw new \Exception("Dataset {$model} not found in path {$dataset}", 1481859677);
        }

        return true;
    }

    /**
     * Create a device info file
     * @param  string $filename
     * @param  string $data
     * @return \vfsStream
     */
    private function createFileOnFilesystem($filename, $data)
    {   
        // Create mock file
        vfsStream::newFile($filename)
            ->at($this->filesystem)
            ->setContent($data);

        return $this->filesystem;
    }
}
