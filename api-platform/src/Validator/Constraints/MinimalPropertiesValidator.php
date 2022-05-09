<?php
// api/src/Validator/Constraints/MinimalPropertiesValidator.php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

/**
 * @Annotation
 */
final class MinimalPropertiesValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        if (array_diff_key(['description' => '', 'price' => ''], $value)) {
            $this->context->buildViolation($constraint->message)->addViolation();
        }
    }
}