<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UserConstraint extends Constraint
{
    public function get()
    {
        return self::CLASS_CONSTRAINT;
    }
}
