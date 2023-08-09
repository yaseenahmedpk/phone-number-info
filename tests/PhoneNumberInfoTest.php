<?php

namespace Bytes4sale\PhoneNumberInfo\tests;

use Bytes4sale\PhoneNumberInfo\Facades\PhoneNumberInfo;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhoneNumberInfoTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function it_can_get_number_type()
    {
        $response = PhoneNumberInfo::getHlrDetails('60329359135');
        
        $this->assertTrue($response->isSuccessful());
        $this->assertEquals('MOBILE', $response->getNumberType()[0]);
        $this->assertEquals('LANDLINE', $response->getNumberType()[0]);
    }
}
