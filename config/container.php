<?php

use UserHierarchy\Command\UserHierarchyCommand;
use UserHierarchy\DTO\UserHierarchyCollection;
use Pimple\Container;
use Symfony\Component\Console\Application;

$container = new Container();

$container['application'] = function (Container $container) {
    $app = new Application('User Hierarchy');

    $app->addCommands([
        $container['command.user'],
    ]);

    return $app;
};

$container['command.user'] = function (Container $container) {
    return new UserHierarchyCommand(
        $container['command.user.hierarchy.collection']
    );
};

$container['command.user.hierarchy.collection'] = function () {
    return new UserHierarchyCollection();
};

return $container;
