<?php

namespace Leibowitz\IronWorkerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('leibowitz_iron_worker')
            ->children()
                ->scalarNode('token')->cannotBeEmpty()->end()
                ->scalarNode('project_id')->cannotBeEmpty()->end()

                ->arrayNode('api')
                    ->children()
                        ->scalarNode('protocol')->cannotBeEmpty()->end()
                        ->scalarNode('host')->cannotBeEmpty()->end()
                        ->scalarNode('port')->cannotBeEmpty()->end()
                        ->scalarNode('api_version')->cannotBeEmpty()->end()
                    ->end()
                ->end()

                ->arrayNode('options')
                    ->children()
                        ->scalarNode('max_retries')->cannotBeEmpty()->end()
                        ->booleanNode('debug_enabled')->end()
                        ->booleanNode('ssl_verifypeer')->end()
                        ->scalarNode('connection_timeout')->cannotBeEmpty()->end()
                    ->end()
                ->end()

            ->end();

        return $treeBuilder;
    }
}
