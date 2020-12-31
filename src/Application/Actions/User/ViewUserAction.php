<?php
declare(strict_types=1);

namespace App\Application\Actions\User;

use App\Domain\User\Service\ViewUserService;
use App\Application\Actions\Action;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface as Response;

class ViewUserAction extends Action
{
    private $viewUserService;

    public function __construct(LoggerInterface $logger, ViewUserService $viewUserService)
    {
        parent::__construct($logger);
        $this->viewUserService = $viewUserService;
    }

    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $userId = (int) $this->resolveArg('userId');

        $user = $this->viewUserService->run($userId);

        $auth = $this->request->getAttribute('auth');
        if ($auth->isAdmin() || $auth->getUserId() == $user->getId()) {
            $user->setShowFullDetail(true);
        }

        return $this->respondWithData($user);
    }
}
