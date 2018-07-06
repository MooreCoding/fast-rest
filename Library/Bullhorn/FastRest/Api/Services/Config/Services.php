<?php
namespace Bullhorn\FastRest\Api\Services\Config;
use Bullhorn\FastRest\Api\Services\Model\Manager as ModelsManager;
use Bullhorn\FastRest\Api\Services\Database\Connections;
use Bullhorn\FastRest\DependencyInjection;
use Bullhorn\FastRest\DependencyInjectionHelper;
use Phalcon\Config;
use Phalcon\Di\InjectionAwareInterface;
use Phalcon\DiInterface;

class Services implements InjectionAwareInterface {

    public function getDi() {
        return DependencyInjectionHelper::getDi();
    }

    public function setDi(DiInterface $di) {
        DependencyInjectionHelper::setDi($di);
    }

    /**
     * initialize
     * @param Config $config
     * @return void
     */
    public function initialize(Config $config) {
        $di = $this->getDi();

        $di->setShared(
            Connections::DI_NAME,
            function() {
                return new Connections();
            }
        );


        $this->getDi()->setShared(
            'modelsManager',
            function() {
                return new ModelsManager();
            }
        );

        $this->addApiConfig();
    }

    /**
     * addApiConfig
     * @return void
     */
    private function addApiConfig() {
        $this->getDi()->setShared(ApiConfig::DI_NAME, new ApiConfig());
    }
}