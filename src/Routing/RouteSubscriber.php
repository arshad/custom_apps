<?php

/**
 * Copyright 2018 Google Inc.
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * version 2 as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 * MA 02110-1301, USA.
 */

namespace Drupal\custom_apps\Routing;

use Drupal\custom_apps\Entity\ListBuilder\DeveloperAppListBuilder;
use Drupal\apigee_kickstart_enhancement\Routing\RouteSubscriber as ApigeeKickstartRouteSubscriber;
use Symfony\Component\Routing\RouteCollection;

/**
 * Custom RouteSubscriber for Custom Apps.
 */
class RouteSubscriber extends ApigeeKickstartRouteSubscriber {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    // Override the controller for the Apigee Edge Apps page.
    /** @var \Drupal\Core\Entity\EntityTypeInterface $app_entity_type */
    foreach ($this->apigeeKickstartEnhancer->getAppEntityTypes() as $entity_type_id => $app_entity_type) {
      if ($route = $collection->get("entity.$entity_type_id.collection_by_" . str_replace('_app', '', $entity_type_id))) {
        if ($entity_type_id == 'developer_app') {
          $route->setDefault('_controller', DeveloperAppListBuilder::class . '::render');
        }
      }
    }
  }

}
