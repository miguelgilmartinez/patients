<?php

/**
 * Maps GraphQL petitions to Symfony
 *
 * @author miguelgilmartinez@gmail.com
 */

namespace App\GraphQL\Resolver;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\ResolverInterface;

class UserResolver implements ResolverInterface, AliasedInterface {

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    public function findAllUsers(Argument $args) {
        $values = $this->em->getRepository(User::class)->findAll();
        return $values;
    }

    public function findByID(Argument $args) {
        return $this->em->getRepository(User::class)
                        ->findOneById($args['userUUID']);
    }

    public static function getAliases(): array {
        return [
            'findAllUsers' => 'all_users',
            'findByID' => 'user_by_id'
        ];
    }

}
