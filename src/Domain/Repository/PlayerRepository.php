<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Player;
use App\Domain\VO\Credentials;
use Doctrine\ORM\EntityRepository;

/**
 * Class PlayerRepository
 *
 * @category Web-project
 * @package  Booi
 * @author   PHP Developer <developer@email.com>
 * @license  https://www.booi.com Booi
 * @link     ****
 */
final class PlayerRepository extends EntityRepository
{
    /**
     * @param Credentials $credentials
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function create(Credentials $credentials): void
    {
        $em = $this->getEntityManager();

        $player = new Player();
        $player->setCredentials($credentials);

        $em->persist($player);
        $em->flush();
    }
}
