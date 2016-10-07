<?php

namespace Black\Bundle\EmailBundle\Application\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class BlackEmailExtension
 *
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 *
 * @license http://opensource.org/licenses/mit-license.php MIT
 */
class BlackEmailExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration($this->getAlias());
        $config = $processor->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../../Resources/config'));

        if (!isset($config['db_driver'])) {
            throw new \InvalidArgumentException('You must provide the black_user.db_driver configuration');
        }

        $container->setParameter($this->getAlias() . '.backend_type_' . $config['db_driver'], true);

        foreach ([] as $service) {
            $loader->load(sprintf('%s.xml', $service));
        }
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return 'black_email';
    }
}
