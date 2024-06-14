<?php

namespace App\Validator;


use Symfony\Component\Validator\Context\ExecutionContextInterface;

class ConstraintCodeVrp
{
    public static function validateCodeVrpIfRoleSFOrAdmin(?int $codeVrp, ExecutionContextInterface $context): void
    {
        $user = $context->getObject();
        
        if (in_array('SF', $user->getRoles()) || in_array('ROLE_ADMIN', $user->getRoles())) {
            if ($codeVrp !== null) {
                $context->buildViolation('Le champ Code VRP doit être vide lorsque le rôle est SF ou Admin.')
                    ->atPath('codeVrp')
                    ->addViolation();
            }
        }
    }


    public static function validateCodeVrpNotNullIfRoleVRP(?int $codeVrp, ExecutionContextInterface $context): void
    {
        $user = $context->getObject();
        
        if (in_array('VRP', $user->getRoles()) && $codeVrp === null) {
            $context->buildViolation('Le champ Code VRP ne peut pas être vide lorsque le rôle est VRP.')
                ->atPath('codeVrp')
                ->addViolation();
        }
    }

}
