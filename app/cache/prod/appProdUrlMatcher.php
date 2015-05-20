<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // projecttodo_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'projecttodo_homepage')), array (  '_controller' => 'Project\\todoBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/task')) {
            // task
            if (rtrim($pathinfo, '/') === '/task') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'task');
                }

                return array (  '_controller' => 'Project\\todoBundle\\Controller\\TaskController::indexAction',  '_route' => 'task',);
            }

            // task_show
            if (preg_match('#^/task/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_show')), array (  '_controller' => 'Project\\todoBundle\\Controller\\TaskController::showAction',));
            }

            // task_new
            if ($pathinfo === '/task/new') {
                return array (  '_controller' => 'Project\\todoBundle\\Controller\\TaskController::newAction',  '_route' => 'task_new',);
            }

            // task_create
            if ($pathinfo === '/task/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_task_create;
                }

                return array (  '_controller' => 'Project\\todoBundle\\Controller\\TaskController::createAction',  '_route' => 'task_create',);
            }
            not_task_create:

            // task_edit
            if (preg_match('#^/task/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_edit')), array (  '_controller' => 'Project\\todoBundle\\Controller\\TaskController::editAction',));
            }

            // task_update
            if (preg_match('#^/task/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_task_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_update')), array (  '_controller' => 'Project\\todoBundle\\Controller\\TaskController::updateAction',));
            }
            not_task_update:

            // task_delete
            if (preg_match('#^/task/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_task_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_delete')), array (  '_controller' => 'Project\\todoBundle\\Controller\\TaskController::deleteAction',));
            }
            not_task_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
