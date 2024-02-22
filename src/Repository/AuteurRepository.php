<?php

namespace App\Repository;

use App\Entity\Auteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Auteur>
 *
 * @method Auteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Auteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Auteur[]    findAll()
 * @method Auteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AuteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Auteur::class);
    }

    public function findAuteursAvecNombreLivresSupérieur(int $nombreLivresMin): array
    {
        $entityManager = $this->getEntityManager();

        $dql = "
            SELECT a, COUNT(l.id) AS HIDDEN nbrLivres
            FROM App\Entity\Auteur a
            JOIN a.livres l
            GROUP BY a.id
            HAVING nbrLivres > :nombreLivresMin
        ";

        $query = $entityManager->createQuery($dql)
                    ->setParameter('nombreLivresMin', $nombreLivresMin);

        return $query->getResult();
    }

}
