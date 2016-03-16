<?php

namespace Rapid\Session\Data;

class MarketingData
{
	protected $channel;
	protected $source;
	protected $campaign;
	protected $landingPage;
	protected $referer;
	protected $userAgent;
	protected $remoteAddress;

	protected $socialMediaOptions  = ['facebook', 'twitter', 'instagram'];
	protected $searchEngineOptions = ['google', 'bing'];

	protected $campaignOptions = [
		'utm_campaign', // facebook
		'campaign',     // adwords
	];

	const CHANNEL_SOCIAL  = 'social';
	const CHANNEL_ORGANIC = 'organic';
	const CHANNEL_DIRECT  = 'direct';
	const CHANNEL_PAID    = 'paid';

    /**
     * Gets the value of channel.
     *
     * @return mixed
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * Sets the value of channel.
     *
     * @param mixed $channel the channel
     *
     * @return self
     */
    protected function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Gets the value of source.
     *
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets the value of source.
     *
     * @param mixed $source the source
     *
     * @return self
     */
    protected function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Gets the value of campaign.
     *
     * @return mixed
     */
    public function getCampaign()
    {
        return $this->campaign;
    }

    /**
     * Sets the value of campaign.
     *
     * @param mixed $campaign the campaign
     *
     * @return self
     */
    protected function setCampaign($campaign)
    {
        $this->campaign = $campaign;

        return $this;
    }

    /**
     * Gets the value of landingPage.
     *
     * @return mixed
     */
    public function getLandingPage()
    {
        return $this->landingPage;
    }

    /**
     * Sets the value of landingPage.
     *
     * @param mixed $landingPage the landing page
     *
     * @return self
     */
    protected function setLandingPage($landingPage)
    {
        $this->landingPage = $landingPage;

        return $this;
    }

    /**
     * Gets the value of referer.
     *
     * @return mixed
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Sets the value of referer.
     *
     * @param mixed $referer the referer
     *
     * @return self
     */
    protected function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Gets the value of userAgent.
     *
     * @return mixed
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Sets the value of userAgent.
     *
     * @param mixed $userAgent the user agent
     *
     * @return self
     */
    protected function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Gets the value of remoteAddress.
     *
     * @return mixed
     */
    public function getRemoteAddress()
    {
        return $this->remoteAddress;
    }

    /**
     * Sets the value of remoteAddress.
     *
     * @param mixed $remoteAddress the remote address
     *
     * @return self
     */
    protected function setRemoteAddress($remoteAddress)
    {
        $this->remoteAddress = $remoteAddress;

        return $this;
    }

    /**
     * Gets the value of socialMediaOptions.
     *
     * @return mixed
     */
    public function getSocialMediaOptions()
    {
        return $this->socialMediaOptions;
    }

    /**
     * Sets the value of socialMediaOptions.
     *
     * @param mixed $socialMediaOptions the social media options
     *
     * @return self
     */
    protected function setSocialMediaOptions($socialMediaOptions)
    {
        $this->socialMediaOptions = $socialMediaOptions;

        return $this;
    }

    /**
     * Gets the value of searchEngineOptions.
     *
     * @return mixed
     */
    public function getSearchEngineOptions()
    {
        return $this->searchEngineOptions;
    }

    /**
     * Sets the value of searchEngineOptions.
     *
     * @param mixed $searchEngineOptions the search engine options
     *
     * @return self
     */
    protected function setSearchEngineOptions($searchEngineOptions)
    {
        $this->searchEngineOptions = $searchEngineOptions;

        return $this;
    }

    /**
     * Gets the value of campaignOptions.
     *
     * @return mixed
     */
    public function getCampaignOptions()
    {
        return $this->campaignOptions;
    }

    /**
     * Sets the value of campaignOptions.
     *
     * @param mixed $campaignOptions the campaign options
     *
     * @return self
     */
    protected function setCampaignOptions($campaignOptions)
    {
        $this->campaignOptions = $campaignOptions;

        return $this;
    }
}