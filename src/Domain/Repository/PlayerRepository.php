<?php

namespace App\Domain\Repository;

use App\Domain\Entity\Player;
use App\Domain\VO\Credentials;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NonUniqueResultException;

/**
 * Class PlayerRepository
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

    /**
     * @param string $email
     *
     * @return bool
     */
    public function deletePlayerByEmail(string $email): bool
    {
        return (bool)$this->createQueryBuilder('p')
            ->update(Player::class, 'p')
            ->set('p.isDeleted', 1)
            ->where('p.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->execute();
    }

    /**
     * @param string $email
     * @param        $newName
     *
     * @return bool
     */
    public function changePlayerNameByEmail(string $email, $newName): bool
    {
        return (bool)$this->createQueryBuilder('p')
            ->update(Player::class, 'p')
            ->set('p.name', $newName)
            ->where('p.email = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->execute();
    }
}
