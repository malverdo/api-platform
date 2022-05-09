<?php
// api/src/Validator/Constraints/MinimalProperties.php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MinimalProperties extends Constraint
{
    public $message = 'нет полей ("description", "price")';
}