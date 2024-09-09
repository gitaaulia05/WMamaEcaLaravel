<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Model\Abtesting;

/**
 * Status Class Doc Comment.
 *
 * @category Class
 *
 * @description A/B test status.  - &#x60;active&#x60;. The A/B test is live and search traffic is split between the two variants. - &#x60;stopped&#x60;. You stopped the A/B test. The A/B test data is still available for analysis. - &#x60;expired&#x60;. The A/B test was automatically stopped after reaching its end date. - &#x60;failed&#x60;. Creating the A/B test failed.
 */
class Status
{
    /**
     * Possible values of this enum.
     */
    public const ACTIVE = 'active';

    public const STOPPED = 'stopped';

    public const EXPIRED = 'expired';

    public const FAILED = 'failed';

    /**
     * Gets allowable values of the enum.
     *
     * @return string[]
     */
    public static function getAllowableEnumValues()
    {
        return [
            self::ACTIVE,
            self::STOPPED,
            self::EXPIRED,
            self::FAILED,
        ];
    }
}