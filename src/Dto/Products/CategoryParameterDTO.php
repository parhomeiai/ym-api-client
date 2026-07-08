<?php

namespace Escorp\YmApiClient\Dto\Products;

/**
 * Характеристика товара.
 */
class CategoryParameterDTO {

    /**
     * Идентификатор категории.
     * @var int|null
     */
    public ?int $id;

    /**
     * Название категории.
     * @var string|null
     */
    public ?string $name;

    /**
     * Можно ли передавать собственное значение, которого нет в списке вариантов Маркета.
     * @var bool|null
     */
    public ?bool $allowCustomValues;

    /**
     * Является ли характеристика особенностью варианта
     * @var bool|null
     */
    public ?bool $distinctive;

    /**
     * Используется ли характеристика в фильтре.
     * @var bool|null
     */
    public ?bool $filtering;

    /**
     * Можно ли передать сразу несколько значений.
     * @var bool|null
     */
    public ?bool $multivalue;

    /**
     * Обязательность характеристики.
     * @var bool|null
     */
    public ?bool $required;

    /**
     * Тип данных:
        TEXT — текст.
        ENUM — список возможных значений.
        BOOLEAN — true или false.
        NUMERIC — число.
     * @var string|null
     */
    public ?string $type;

    /**
     * Ограничения на значения. Только для характеристик типа TEXT и NUMERIC.
     * @var ParameterValueConstraintsDTO|null
     */
    public ?ParameterValueConstraintsDTO $constraints;

    /**
     * Описание характеристики.
     * @var string|null
     */
    public ?string $description;

    /**
     * Перечень возможных рекомендаций по заполнению карточки, к которым относится данная характеристика.
     * @var array
     */
    public array $recommendationTypes = [];

    /**
     * Единицы измерения характеристики товара.
     * @var CategoryParameterUnitDTO|null
     */
    public ?CategoryParameterUnitDTO $unit;

    /**
     * Ограничения на значения, накладываемые другими характеристиками. Только для характеристик типа ENUM.
     * @var array | ValueRestrictionDTO[]
     */
    public array $valueRestrictions;

    /**
     * Список допустимых значений параметра. Только для характеристик типа ENUM.
     * @var array | ParameterValueOptionDTO[]
     */
    public array $values;

    function __construct(?int $id, ?string $name, ?bool $allowCustomValues, ?bool $distinctive, ?bool $filtering, ?bool $multivalue, ?bool $required, ?string $type, ?ParameterValueConstraintsDTO $constraints, ?string $description, array $recommendationTypes, ?CategoryParameterUnitDTO $unit, array $valueRestrictions, array $values) {
        $this->id = $id;
        $this->name = $name;
        $this->allowCustomValues = $allowCustomValues;
        $this->distinctive = $distinctive;
        $this->filtering = $filtering;
        $this->multivalue = $multivalue;
        $this->required = $required;
        $this->type = $type;
        $this->constraints = $constraints;
        $this->description = $description;
        $this->recommendationTypes = $recommendationTypes;
        $this->unit = $unit;
        $this->valueRestrictions = $valueRestrictions;
        $this->values = $values;
    }

        /**
     *
     * @param array $data
     * @return self
     * @throws DtoMappingException
     */
    public static function fromArray(array $data): self
    {
        $valueRestrictions = [];
        foreach($data['valueRestrictions'] ?? [] as $valueRestriction){
            $valueRestrictions[] = ValueRestrictionDTO::fromArray($valueRestriction);
        }

        $values = [];
        foreach($data['values'] ?? [] as $value){
            $values[] = ParameterValueOptionDTO::fromArray($value);
        }

        return new self(
            isset($data['id']) ? (int)$data['id'] : null,
            isset($data['name']) ? (string)$data['name'] : null,
            isset($data['allowCustomValues']) ? (bool)$data['allowCustomValues'] : null,
            isset($data['distinctive']) ? (bool)$data['distinctive'] : null,
            isset($data['filtering']) ? (bool)$data['filtering'] : null,
            isset($data['multivalue']) ? (bool)$data['multivalue'] : null,
            isset($data['required']) ? (bool)$data['required'] : null,
            isset($data['type']) ? (string)$data['type'] : null,
            isset($data['constraints']) ? ParameterValueConstraintsDTO::fromArray($data['constraints']) : null,
            isset($data['description']) ? (string)$data['description'] : null,
            $data['recommendationTypes'] ?? [],
            isset($data['unit']) ? CategoryParameterUnitDTO::fromArray($data['unit']) : null,
            $valueRestrictions,
            $values
        );
    }
}
