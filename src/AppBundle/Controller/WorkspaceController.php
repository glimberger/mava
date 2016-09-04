<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Workspace;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WorkspaceController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/workspace/{name}", name="workspace_show")
     */
    public function showAction($name)
    {
        try {
            $workspace = $this->workspaceForName($name);

            $projects = $this->getProjectsInWorkspace($workspace);
        } catch (\Exception $exception) {
            throw $this->createNotFoundException($exception->getMessage());
        }

        return $this->render(
            'workspace/show.html.twig',
            array('projects' => $projects)
        );
    }

    private function workspaceForName($name)
    {
        $workspaceRepository = $this->getDoctrine()->getRepository('AppBundle:Workspace');

        $requestedWorkspace = $workspaceRepository->findOneBy(array('name' => $name));

        if (is_null($requestedWorkspace))
            throw new \Exception(sprintf("Workspace with name '%s' not found", $name));

        return $requestedWorkspace;
    }

    private function getProjectsInWorkspace(Workspace $workspace)
    {
        $projectRepository = $this->getDoctrine()->getRepository('AppBundle:Project');

        $projects = $projectRepository->findBy(array('workspace' => $workspace));

        if (is_null($projects))
            throw new \Exception(sprintf("Projects in workspace '%s' not found!", $workspace->getName()));

        return $projects;
    }
}
