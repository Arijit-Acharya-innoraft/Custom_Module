<?php

namespace Drupal\dependency\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\dependency\Services\BlockPermission;
use Drupal\dependency\Services\WithService;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Display block to users with permission using services & Dependency injection.
 *
 * @Block(
 *   id = "blockid",
 *   admin_label = @Translation("Block Title"),
 *   category = @Translation("Blockid")
 * )
 */
class BlockService extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The user service.
   *
   * @var \Drupal\dependency\Services\WithService
   */
  protected $user;

  /**
   * The block visibility service.
   *
   * @var \Drupal\dependency\Services\BlockPermission
   */
  protected $visibility;

  /**
   * BlockService constructor.
   *
   * @param array $configuration
   *   An array of configuration settings for the block.
   * @param string $plugin_id
   *   The plugin ID for the block.
   * @param array $plugin_definition
   *   The plugin definition for the block.
   * @param \Drupal\dependency\Services\WithService $user
   *   The user service.
   * @param \Drupal\dependency\Services\BlockPermission $visibility
   *   The block visibility service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, WithService $user, BlockPermission $visibility) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->user = $user;
    $this->visibility = $visibility;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('dependency.with_service'),
      $container->get('dependency.block_visibility')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $permission = $this->visibility->blockVisibilityRestriction();
    $data = $this->user->getRole();
    if ($permission) {
      $user_roles = implode(" ", $data);
      return [
        '#type' => 'markup',
        '#markup' => $this->t('Welcome @user_roles!', [
          '@user_roles' => $user_roles,
        ]),
      ];
    }
  }

}
