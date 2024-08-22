<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\WorkflowState;
use Symfony\Component\Workflow\Registry as WorkflowRegistry;

class ReproduceWorkflowBugCommand extends Command
{
    /**
     * @return void
     */
    protected function configure()
    {
        $this
            ->setName('ReproduceWorkflowBugCommand')
            ->setDescription('')
        ;
    }

    /**
     * @var Symfony\Component\Workflow\Registry
     */
    protected $workflowRegistry;

    /**
     * @param Symfony\Component\Workflow\Registry $workflowRegistry
     */
    public function __construct(WorkflowRegistry $workflowRegistry)
    {
        parent::__construct();

        $this->workflowRegistry = $workflowRegistry;
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     * 
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $workflowState = new WorkflowState();

        $workflow = $this->workflowRegistry->get($workflowState, 'reproduce_bug');

        $workflow->apply($workflowState, 'from_initial_place_to_a_and_b');
        $workflow->apply($workflowState, 'from_b_to_d');
        $workflow->apply($workflowState, 'from_a_to_c');

        return 0;
    }
}
