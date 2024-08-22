<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\WorkflowState;
use Symfony\Component\Workflow\Registry as WorkflowRegistry;

class ReproduceWorkflowBugController
{
    #[Route('/')]
    public function index(WorkflowRegistry $workflowRegistry): Response
    {
        $workflowState = new WorkflowState();

        $workflow = $workflowRegistry->get($workflowState, 'reproduce_bug');

        $workflow->apply($workflowState, 'from_initial_place_to_a_and_b');
        $workflow->apply($workflowState, 'from_b_to_d');
        $workflow->apply($workflowState, 'from_a_to_c');

        return new Response(
            '<html><body>finished request</body></html>'
        );
    }
}
