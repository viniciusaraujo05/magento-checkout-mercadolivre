<?php

namespace Webjump\WebApiTrilha\Api\Data;

interface PetInterface
{
    public const TABLE = 'pet_kind';

    // Fields
    public const ENTITY_ID = 'entity_id';
    public const NAME = 'name';
    public const DESCRIPTION = 'description';
    public const CREATED_AT = 'created_at';

    /**
     * GetEntityId
     *
     * @return mixed
     */
    public function getEntityId();

    /**
     * SetEntityId
     *
     * @param int $entityId
     *
     * @return mixed
     */
    public function setEntityId(int $entityId);

    /**
     * getName
     *
     * @return mixed
     */
    public function getName();

    /**
     * setName
     *
     * @param String $name
     *
     * @return mixed
     */
    public function setName(String $name);

    /**
     * getDescription
     *
     * @return mixed
     */
    public function getDescription();

    /**
     * setDescription
     *
     * @param String $description
     *
     * @return mixed
     */
    public function setDescription(String $description);

    /**
     * getCreatedAt
     *
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * setCreatedAt
     *
     * @param String $create
     *
     * @return mixed
     */
    public function setCreatedAt(String $create);
}
