<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Player;
use App\Domain\VO\Credentials;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Immutable\ValueObject\Email;

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
        $player = new Player();
        $player->setCredentials($credentials);

        $this->_em->persist($player);
        $this->_em->flush();
    }

    /**
     * @param string $email
     *
     * @return Player
     */
    public function getPlayerByEmail(string $email): Player
    {
        try {
            return $this->createQueryBuilder('p')
                ->where('p.email = :email')
                ->setParameter('email', $email)
                ->getQuery()
                ->getOneOrNullResult();

        } catch (NonUniqueResultException $e) {
            return new Player();
        }
    }
}
