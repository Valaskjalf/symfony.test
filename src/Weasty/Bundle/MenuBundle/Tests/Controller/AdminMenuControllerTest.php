<?php

namespace Weasty\Bundle\MenuBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminMenuControllerTest extends WebTestCase
{
    public function testLinks()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/menu/links');
    }

    public function testAdd()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/menu/add');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/menu/edit');
    }

    public function testDelete()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin/menu/delete');
    }

}
