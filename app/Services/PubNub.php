<?php namespace Strimoid\Services;

use Strimoid\Contracts\PubSub;

class PubNub implements PubSub {

    /**
     * @var \Pubnub\Pubnub
     */
    protected $pubnub;

    /**
     * @param \Pubnub\Pubnub $pubnub
     */
    public function __construct(\Pubnub\Pubnub $pubnub)
    {
        $this->pubnub = $pubnub;
    }

    /**
     * Publish new message on given channel.
     *
     * @param  $channel
     * @param  $message
     * @return void
     */
    public function publish($channel, $message)
    {
        $this->pubnub->publish($channel, $message);
    }

    /**
     * Subscribe to given channel.
     *
     * @param  $channel
     * @param  callable $callback
     * @return void
     */
    public function subscribe($channel, Closure $callback)
    {
        $this->pubnub->subscribe($channel, $callback);
    }
}