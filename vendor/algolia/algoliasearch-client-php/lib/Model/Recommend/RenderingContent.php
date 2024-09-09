<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Model\Recommend;

use Algolia\AlgoliaSearch\Model\AbstractModel;
use Algolia\AlgoliaSearch\Model\ModelInterface;

/**
 * RenderingContent Class Doc Comment.
 *
 * @category Class
 *
 * @description Extra data that can be used in the search UI.  You can use this to control aspects of your search UI, such as, the order of facet names and values without changing your frontend code.
 */
class RenderingContent extends AbstractModel implements ModelInterface, \ArrayAccess, \JsonSerializable
{
    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelTypes = [
        'facetOrdering' => '\Algolia\AlgoliaSearch\Model\Recommend\FacetOrdering',
        'redirect' => '\Algolia\AlgoliaSearch\Model\Recommend\RedirectURL',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelFormats = [
        'facetOrdering' => null,
        'redirect' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'facetOrdering' => 'facetOrdering',
        'redirect' => 'redirect',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'facetOrdering' => 'setFacetOrdering',
        'redirect' => 'setRedirect',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'facetOrdering' => 'getFacetOrdering',
        'redirect' => 'getRedirect',
    ];

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     */
    public function __construct(?array $data = null)
    {
        if (isset($data['facetOrdering'])) {
            $this->container['facetOrdering'] = $data['facetOrdering'];
        }
        if (isset($data['redirect'])) {
            $this->container['redirect'] = $data['redirect'];
        }
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function modelTypes()
    {
        return self::$modelTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function modelFormats()
    {
        return self::$modelFormats;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        return [];
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return 0 === count($this->listInvalidProperties());
    }

    /**
     * Gets facetOrdering.
     *
     * @return null|FacetOrdering
     */
    public function getFacetOrdering()
    {
        return $this->container['facetOrdering'] ?? null;
    }

    /**
     * Sets facetOrdering.
     *
     * @param null|FacetOrdering $facetOrdering facetOrdering
     *
     * @return self
     */
    public function setFacetOrdering($facetOrdering)
    {
        $this->container['facetOrdering'] = $facetOrdering;

        return $this;
    }

    /**
     * Gets redirect.
     *
     * @return null|RedirectURL
     */
    public function getRedirect()
    {
        return $this->container['redirect'] ?? null;
    }

    /**
     * Sets redirect.
     *
     * @param null|RedirectURL $redirect redirect
     *
     * @return self
     */
    public function setRedirect($redirect)
    {
        $this->container['redirect'] = $redirect;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
     *
     * @return null|mixed
     */
    public function offsetGet($offset): mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param null|int $offset Offset
     * @param mixed    $value  Value to be set
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param int $offset Offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }
}