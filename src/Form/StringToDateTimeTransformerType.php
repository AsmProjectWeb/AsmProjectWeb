<?php

namespace App\Form;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class StringToDateTimeTransformer implements DataTransformerInterface
{
    public function transform($value)
    {
        // transform the DateTime object back to a string for displaying in the form
        if ($value instanceof \DateTimeInterface) {
            return $value->format('Y-m-d');
        }

        return $value;
    }
    public function reverseTransform($value)
    {
        // transform the string input into a DateTime object
        try {
            return new \DateTime($value);
        } catch (\Exception $e) {
            throw new TransformationFailedException(sprintf(
                'The input %s is not a valid date.',
                $value
            ));
        }
    }
}
