<?php

namespace Drupal\custom_apps\Entity\ListBuilder;

use Drupal\apigee_edge\Entity\ListBuilder\DeveloperAppListBuilderForDeveloper;

/**
 * Renders the Apps list.
 */
class DeveloperAppListBuilder extends DeveloperAppListBuilderForDeveloper {

  /**
   * {@inheritdoc}
   */
  public function render() {
    // Render a list of apps.
    $build = [
      '#theme' => 'app_listing',
      '#apps' => $this->load(),
    ];

    // Add cache contexts.
    $build['#cache']['contexts'] = $this->entityType->getListCacheContexts();
    $build['#cache']['tags'] = $this->entityType->getListCacheTags();

    return $build;
  }

}
