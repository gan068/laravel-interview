<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\PagerService;

class PagerTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->pager = app(PagerService::class);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetTotalPages()
    {
        $this->assertEquals($this->pager->getTotalPages(1, 1), 1);
        $this->assertEquals($this->pager->getTotalPages(0, 1), 1);
        $this->assertEquals($this->pager->getTotalPages(0, 0), 1);
        $this->assertEquals($this->pager->getTotalPages(1, 0), 1);
        $this->assertEquals($this->pager->getTotalPages(10, 5), 2);
        $this->assertEquals($this->pager->getTotalPages(16, 5), 4);
        $this->assertEquals($this->pager->getTotalPages(10, 20), 1);
    }
}
