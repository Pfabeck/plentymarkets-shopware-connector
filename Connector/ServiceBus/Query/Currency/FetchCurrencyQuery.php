<?php

namespace PlentyConnector\Connector\ServiceBus\Query\Currency;

use Assert\Assertion;
use PlentyConnector\Connector\ServiceBus\Query\FetchQueryInterface;

/**
 * Class FetchCurrencyQuery
 */
class FetchCurrencyQuery implements FetchQueryInterface
{
    /**
     * @var string
     */
    private $adapterName;

    /**
     * @var string
     */
    private $identifier;

    /**
     * FetchCurrencyQuery constructor.
     *
     * @param string $adapterName
     * @param string $identifier
     */
    public function __construct($adapterName, $identifier)
    {
        Assertion::string($adapterName);
        Assertion::uuid($identifier);

        $this->adapterName = $adapterName;
        $this->identifier = $identifier;
    }

    /**
     * @return string
     */
    public function getAdapterName()
    {
        return $this->adapterName;
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * {@inheritdoc}
     */
    public function getPayload()
    {
        return [
            'adapterName' => $this->adapterName,
            'identifier' => $this->identifier,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function setPayload(array $payload = [])
    {
        $this->adapterName = $payload['adapterName'];
        $this->identifier = $payload['identifier'];
    }
}