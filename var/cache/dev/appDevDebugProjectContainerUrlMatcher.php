<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        if (0 === strpos($pathinfo, '/article')) {
            // article
            if ($pathinfo === '/article/create') {
                return array (  '_controller' => 'AppBundle\\Controller\\ArticleController::createArticle',  '_route' => 'article',);
            }

            // app_article_viewarticle
            if ($pathinfo === '/articles/view') {
                return array (  '_controller' => 'AppBundle\\Controller\\ArticleController::viewArticle',  '_route' => 'app_article_viewarticle',);
            }

            // app_article_viewidarticle
            if (0 === strpos($pathinfo, '/article/view') && preg_match('#^/article/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_article_viewidarticle')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::viewIdArticle',));
            }

            // app_article_updatevideo
            if (0 === strpos($pathinfo, '/article/update') && preg_match('#^/article/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_article_updatevideo')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::updateVideo',));
            }

        }

        // homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'homepage');
            }

            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        if (0 === strpos($pathinfo, '/podcast')) {
            // app_podcastt_createpodcast
            if ($pathinfo === '/podcast/create') {
                return array (  '_controller' => 'AppBundle\\Controller\\PodcasttController::createPodcast',  '_route' => 'app_podcastt_createpodcast',);
            }

            // app_podcastt_viewpodcast
            if ($pathinfo === '/podcasts/view') {
                return array (  '_controller' => 'AppBundle\\Controller\\PodcasttController::viewPodcast',  '_route' => 'app_podcastt_viewpodcast',);
            }

            // app_podcastt_viewidpodcast
            if (0 === strpos($pathinfo, '/podcast/view') && preg_match('#^/podcast/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_podcastt_viewidpodcast')), array (  '_controller' => 'AppBundle\\Controller\\PodcasttController::viewIdPodcast',));
            }

            // app_podcastt_updatepodcast
            if (0 === strpos($pathinfo, '/podcast/update') && preg_match('#^/podcast/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_podcastt_updatepodcast')), array (  '_controller' => 'AppBundle\\Controller\\PodcasttController::updatePodcast',));
            }

            // app_podcastt_deletepodcast
            if (0 === strpos($pathinfo, '/podcast/delete') && preg_match('#^/podcast/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_podcastt_deletepodcast')), array (  '_controller' => 'AppBundle\\Controller\\PodcasttController::deletePodcast',));
            }

        }

        if (0 === strpos($pathinfo, '/video')) {
            // app_video_createvideo
            if ($pathinfo === '/video/create') {
                return array (  '_controller' => 'AppBundle\\Controller\\VideoController::createVideo',  '_route' => 'app_video_createvideo',);
            }

            // app_video_viewvideo
            if ($pathinfo === '/videos/view') {
                return array (  '_controller' => 'AppBundle\\Controller\\VideoController::viewVideo',  '_route' => 'app_video_viewvideo',);
            }

            // app_video_viewidvideo
            if (0 === strpos($pathinfo, '/video/view') && preg_match('#^/video/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_video_viewidvideo')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::viewIdVideo',));
            }

            // app_video_updatevideo
            if (0 === strpos($pathinfo, '/video/update') && preg_match('#^/video/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_video_updatevideo')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::updateVideo',));
            }

            // app_video_deletevideo
            if (0 === strpos($pathinfo, '/video/delete') && preg_match('#^/video/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_video_deletevideo')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::deleteVideo',));
            }

        }

        if (0 === strpos($pathinfo, '/podcast')) {
            // podcast_creation
            if ($pathinfo === '/podcast/create') {
                return array (  '_controller' => 'AppBundle:Podcast:create',  '_route' => 'podcast_creation',);
            }

            // podcast_view
            if ($pathinfo === '/podcasts/view') {
                return array (  '_controller' => 'AppBundle:Podcast:view',  '_route' => 'podcast_view',);
            }

            // podcast_update
            if (0 === strpos($pathinfo, '/podcast/update') && preg_match('#^/podcast/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'podcast_update')), array (  '_controller' => 'AppBundle:Podcast:update',));
            }

            // podcast_viewId
            if (0 === strpos($pathinfo, '/podcast/view') && preg_match('#^/podcast/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'podcast_viewId')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::viewIdAction',));
            }

        }

        if (0 === strpos($pathinfo, '/article')) {
            // article_creation
            if ($pathinfo === '/article/create') {
                return array (  '_controller' => 'AppBundle\\Controller\\ArticleController::createAction',  '_route' => 'article_creation',);
            }

            // article_view
            if ($pathinfo === '/articles/view') {
                return array (  '_controller' => 'AppBundle\\Controller\\ArticleController::viewAction',  '_route' => 'article_view',);
            }

            // article_update
            if (0 === strpos($pathinfo, '/article/update') && preg_match('#^/article/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_update')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::updateAction',));
            }

            // article_viewId
            if (0 === strpos($pathinfo, '/article/view') && preg_match('#^/article/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'article_viewId')), array (  '_controller' => 'AppBundle\\Controller\\ArticleController::viewIdAction',));
            }

        }

        if (0 === strpos($pathinfo, '/video')) {
            // video_creation
            if ($pathinfo === '/video/create') {
                return array (  '_controller' => 'AppBundle\\Controller\\VideoController::createAction',  '_route' => 'video_creation',);
            }

            // video_view
            if ($pathinfo === '/videos/view') {
                return array (  '_controller' => 'AppBundle\\Controller\\VideoController::viewAction',  '_route' => 'video_view',);
            }

            // video_update
            if (0 === strpos($pathinfo, '/video/update') && preg_match('#^/video/update/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'video_update')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::updateAction',));
            }

            // video_viewId
            if (0 === strpos($pathinfo, '/video/view') && preg_match('#^/video/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'video_viewId')), array (  '_controller' => 'AppBundle\\Controller\\VideoController::viewIdAction',));
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
