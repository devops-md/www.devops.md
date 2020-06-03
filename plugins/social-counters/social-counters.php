<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class SocialCountersPlugin
 * @package Grav\Plugin
 */
class SocialCountersPlugin extends Plugin
{
    protected $active = false;

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Initialize configuration
     */
    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->enable([
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
        ]);
    }


    /**
     * Make form accessible from twig.
     */
    public function onTwigSiteVariables()
    {
        require_once $this->grav['locator']->findResource('plugins://github/vendor/autoload.php');

        $config = $this->config->get('plugins.social-counters');

        $cache = $this->grav['cache'];
        $cache_id = md5('social-counters'.$cache->getKey());

        $github = $cache->fetch($cache_id . '-github');
        $twitter = $cache->fetch($cache_id . '-twitter');

        // Github not found in cache, try again
        if ($github === false) {

            $client = new \Github\Client();

            $repo = $client->api('repo');

            try {
                $github['stars'] = $repo->show($config['github']['user'], $config['github']['repo'])['stargazers_count'];
                $cache->save($cache_id . '-github', $github, $config['cache_timeout']);
            } catch(\Exception $e) {
                $github['error'] = $e->getMessage();
            }
        }

        // Twitter not found in cache, try again
        if ($twitter === false) {

            $response = json_decode(file_get_contents("https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=".$config['twitter']['user']));
            $followers = $response[0]->followers_count;

            if (is_int($followers)) {

                $twitter['followers'] = $followers;
                $cache->save($cache_id . '-twitter', $twitter, $config['cache_timeout']);
            } else {
                $twitter['error'] = 'Could not retrieve Twitter followers';
            }
        }

        $this->grav['twig']->twig_vars['social_counters'] = ['github' => $github, 'twitter' => $twitter];

    }
}
