<?php

namespace Tests\Feature\Pages;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\PageWithPrefixTestCase as TestCase ;

class BlogPageTest extends TestCase
{
    protected string $pageRoutePrefix = 'blog.' ;
    

}
