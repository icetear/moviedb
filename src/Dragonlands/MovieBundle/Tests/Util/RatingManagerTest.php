<?php

// src/Dragonlands/MovieBundle/Tests/Util/RatingManagerTest.php

namespace Dragonlands\MovieBundle\Tests\Util;

use Dragonlands\MovieBundle\Util\RatingManager;

class RatingManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $rm = new RatingManager();

        $rating_text = $rm->getRatingText(1);

        $this->assertEquals("Excellent!", $rating_text);

    }

}