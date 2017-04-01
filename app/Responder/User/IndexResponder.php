<?php
declare(strict_types=1);

namespace App\Responder\User;

use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class IndexResponder
 */
class IndexResponder
{
    /**
     * @param \Generator $generator
     *
     * @return Response
     */
    public function emit(\Generator $generator): Response
    {
        $data = [];
        $attribute = iterator_to_array($generator);
        if (count($attribute)) {
            $data = $this->serializer()->toArray($attribute);
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @return \JMS\Serializer\Serializer
     */
    protected function serializer(): Serializer
    {
        return SerializerBuilder::create()->build();
    }
}
