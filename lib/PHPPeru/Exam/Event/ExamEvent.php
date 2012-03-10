<?php

/*
 * This file is part of the PHPPeru packages.
 *
 * (c) Luis Cordova <cordoval@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PHPPeru\ProjectFolder\SubFolder;

use PHPPeru\ProjectFolder\SubFolder\ClassName;

/**
 * ExamEvent.php: Short description.
 *
 * Two line explanation.
 *
 * @author Luis Cordova <cordoval@gmail.com>
 */
namespace Acme\StoreBundle;

final class StoreEvents
{
    /**
     * The store.order event is thrown each time an order is created
     * in the system.
     *
     * The event listener receives an Acme\StoreBundle\Event\FilterOrderEvent
     * instance.
     *
     * @var string
     */
    const onStoreOrder = 'store.order';
}