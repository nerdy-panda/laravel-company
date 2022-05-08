<?php

namespace Tests\Feature\Pages\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\ApiV1PageTestCase as TestCase;
/* @todo rename this class !!! */

class HomePageApiTest extends TestCase
{
    protected string $pageRoute = 'home';

    public function test_home_api_page_should_have_200_status_code():void {
        /* @todo have duplicate code !!!  */
        $testResponse = $this->get(
            route($this->pageRouteWithPrefix())
        );
        $testResponse->assertStatus(200);
    }

    public function test_content_type_header_in_home_api_page_response_should_is_application_json():void {
        $testResponse = $this->get(
            route($this->pageRouteWithPrefix())
        );
        $testResponse->assertHeader('content-type','application/json');
    }


}
