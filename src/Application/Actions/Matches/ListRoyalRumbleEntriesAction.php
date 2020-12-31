<?php
declare(strict_types=1);

namespace App\Application\Actions\Matches;

use App\Domain\Matches\Service\ListRoyalRumbleEntriesService;
use App\Application\Actions\Action;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface as Response;

class ListRoyalRumbleEntriesAction extends Action
{
    private $listRoyalRumbleEntriesService;

    public function __construct(LoggerInterface $logger, ListRoyalRumbleEntriesService $listRoyalRumbleEntriesService)
    {
        parent::__construct($logger);
        $this->listRoyalRumbleEntriesService = $listRoyalRumbleEntriesService;
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $royalrumbleId = (int) $this->resolveArg('royalrumbleId');

        $royalrumbleEntryList = $this->listRoyalRumbleEntriesService->run($royalrumbleId);

        return $this->respondWithData($royalrumbleEntryList);
    }
}
