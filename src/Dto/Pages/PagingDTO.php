<?php

namespace Escorp\YmApiClient\Dto\Pages;

/**
 * Идентификатор следующей страницы.
 */
class PagingDTO {

    /**
     * Идентификатор следующей страницы результатов.
     *
     * @var string|null
     */
    public ?string $nextPageToken;


    function __construct(?string $nextPageToken) {
        $this->nextPageToken = $nextPageToken;
    }

            /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        return new self(
            isset($data['nextPageToken']) ? (string)$data['nextPageToken'] : null
        );
    }
}
