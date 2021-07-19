<?php

namespace Flowframe\LaravelGlide\Tests;

class GlideTest extends TestCase
{
    public function test_it_should_generate_a_correct_query_string()
    {
        $image = glide('hello-world.jpg', ['w' => 640, 'h' => 480]);

        $this->assertEquals(
            'http://localhost/glide-image/hello-world.jpg?w=640&h=480',
            $image,
        );
    }
}
