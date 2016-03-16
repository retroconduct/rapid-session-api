<?php

namespace Rapid\Session;

use Rapid\Session\Data\MarketingData;
use Rapid\Exception\UrlNotFoundException;
use Rapid\Exception\UrlMalformedException;
use Rapid\Exception\InvalidChannelException;

class Session
{
    /**
     * Returns a structured marketing data object by filtering
     * the supplied params and their values
     *
     * @param  string        $landingPageUrl url of the landing page
     * @param  string        $refererUrl     url of the referer page
     * @return MarketingData                 marketing data created by processing the urls
     */
    public function getMarketingData($landingPageUrl = null, $refererUrl = null)
    {
        if (is_null($landingPage)) {
            throw new UrlNotFoundException();
        }

        // breakdown url string into parts and organize in an array format
        // separating hostname, port, query and etc
        $landingPageParts = parse_url($landingPageUrl);

        if (! $landingPageParts) {
            throw new UrlMalformedException();
        }

        // breakdown url string into parts and organize in an array format
        // separating hostname, port, query and etc
        $refererParts = parse_url($refererUrl);

        $data                = new MarketingData();
        $socialMediaOptions  = $data->getSocialMediaOptions();
        $searchEngineOptions = $data->getSearchEngineOptions();
        $campaignOptions     = $data->getCampaignOptions();

        // check whether the landing page url is set
        if (isset($landingPageParts['host'])) {
            $data->setLandingPage($landingPageParts['host']);
        }

        // check if the referer url is set
        if (isset($refererParts['host'])) {
            $data->setReferer($refererParts['host']);

            // check whether the referer is from a social media url
            if (count($socialMediaOptions) > 0) {
                foreach ($socialMediaOptions as $socialMediaOption) {
                    $matched = preg_match("/" . $socialMediaOption . "/i", $refererParts['host']);

                    if ($matched == 1) {
                        $data->setChannel(MarketingData::CHANNEL_SOCIAL);
                        $data->setSource($socialMediaOption);
                    }
                }
            }

            // check whether the referer is from a search engine url
            $this->matchUrlAndSetChannel();
            if (count($searchEngineOptions) > 0) {
                foreach ($searchEngineOptions as $searchEngineOption) {
                    $matched = preg_match("/" . $searchEngineOption . "/i", $refererParts['host']);

                    if ($matched == 1) {
                        $data->setChannel(MarketingData::CHANNEL_ORGANIC);
                        $data->setSource($searchEngineOption);
                    }
                }
            }

            // check whether query params exists from the referer url
            // and set campaign information accordingly
            if (isset($refererParts['query'])) {

                // breakdown query string into parts and organize in an array format
                // separating key value pairs in an associative array
                parse_str($refererParts['query'], $queryParts);

                if (count($queryParts) > 0) {
                    foreach ($queryParts as $key => $value) {
                        // check if any parameter pair matches an existing
                        // marketing campaign condition and if so, set campaign
                        if (in_array($key, $campaignOptions)) {
                            $data->setCampaign($value);
                        }
                    }
                }

                // if a campaign is provided, set the channel to paid
                if ($data->getCampaign()) {
                    $data->setChannel(MarketingData::CHANNEL_PAID);
                    $data->setSource($data->getCampaign());
                }
            }
        } else {
            // if referer url is not set, set the channel to direct since the request
            // has reached the landing page directly without a referer
            $data->setChannel(MarketingData::CHANNEL_DIRECT);
            $data->setSource(MarketingData::CHANNEL_DIRECT);
        }

        return $data;
    }

    /**
     * Match a given url with given options and set the marketing data
     * accordingly to the MarketingData object
     * @param  array         $options set of options
     * @param  string        $url     fully qualified url
     * @param  MarketingData $data    marketing data object
     * @param  string        $channel channel type (defined in MarketingData constants)
     * @return void
     */
    private function matchUrlAndSetChannel($options = array(), $url, MarketingData &$data, $channel)
    {
        if (! MarketingData::$channel) {
            throw new InvalidChannelException();
        }

        if (count($options) > 0) {
            foreach ($options as $option) {
                $matched = preg_match("/" . $option . "/i", $url);

                if ($matched == 1) {
                    $data->setChannel(MarketingData::$channel);
                    $data->setSource($option);
                }
            }
        }
    }
}